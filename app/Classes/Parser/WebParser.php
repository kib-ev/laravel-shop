<?php

namespace App\Classes\Parser;

use App\Helpers\SearchHelper;
use App\Models\Parser\Link;
use App\Models\ProductCategory;
use Modules\Shop\Entities\Product;
use Pharse;

class WebParser
{

    public function run()
    {
        $this->saveCategories('http://1000-stroy.by/');

        $productsAll = collect();
        foreach (ProductCategory::all() as $category) {
            $url = $category->parser_link . '?limit=100';
            $products = $this->parseProductsFromSingleCategoryPage($url);

            foreach ($products as $product) {
                $product->category_id = $category->id;
            }

            $productsAll = $productsAll->merge($products);
        }

        foreach ($productsAll as $product) {
            if (!$product->category->hasChildren())
                $product->save();
        }

        dd('end');
    }

    public function saveCategories($url)
    {
        $content = file_get_contents($url);
        $html = Pharse::str_get_dom($content);

        $menuItems = $html('.menu-body > ul > li');

        foreach ($menuItems as $menuItem) {

            $category = ProductCategory::firstOrCreate([
                'name' => trim($menuItem('a', 0)->getPlainText()),
                'parser_link' => $menuItem('a', 0)->getAttribute('href')
            ]);
            $category->parent_id = 0;
            $category->save();

            $subMenuItems = $menuItem('ul li');

            foreach ($subMenuItems as $subMenuItem) {
                $subCategory = ProductCategory::firstOrCreate([
                    'name' => trim($subMenuItem->firstChild('a')->getPlainText()),
                    'parser_link' => $subMenuItem->firstChild('a')->getAttribute('href')
                ]);
                $subCategory->parent_id = $category->id;
                $subCategory->save();
            }

        }
    }

    public function parseProductsFromSingleCategoryPage($url)
    {
        $content = file_get_contents($url);
        $html = Pharse::str_get_dom($content);

        $htmlProducts = $html('#content .product-layout');

        $products = collect();
        foreach ($htmlProducts as $htmlProduct) {

            $priceNewHtml = $htmlProduct('.price-new', 0);
            if ($priceNewHtml) {
                $price = trim(str_replace('р.', '', $priceNewHtml->getPlainText()));
            } else {
                $price = trim(str_replace('р.', '', $htmlProduct('.price', 0)->getPlainText()));
            }

            $product = new \App\Models\Product([
                'name' => $htmlProduct('a', 1)->getPlainText(),
                'parser_link' => $htmlProduct('a', 1)->getAttribute('href'),
                'image_path' => $htmlProduct('img', 0)->getAttribute('src'),
                'price' => $price,
            ]);


            $products->add($product);
        }

        return $products;
    }


    /**
     * Получаем ссылки на сайт донор из Google, по наименованию товара.
     * Так как функция может выполнятся очень долго... было принято решение
     * перенести её на локальный сервер 86.57.209.252 и периодически запускать
     * по веб-запросу http://86.57.209.252/parser/public/links/parse?name=$name&force=on
     * Таким образом, данные так же сохраняются на локальном сервере
     *
     * @param string $productName
     * @return bool
     */
    public function saveLinksFromGoogle($productName = null)
    {
        $product = null;

        if (!$productName) {
            $product = Product::where('brand_id', 1)->orderBy('scanned', 'asc')->first();
        } else {
            $product = \App\Filter::where('search', SearchHelper::field($productName))
                ->where('brand_id', 1)
                ->first();
        }

        if ($product) {
            $url = "http://86.57.209.252/parser/public/links/parse?name={$product->search}&force=on";
            $result = $this->curlSendRequest($url);
            $jsonArray = json_decode($result, true);

//            $jsonArray = $this->getLinksFromGoogle($product->search, 'on');

            if (isset($jsonArray['count'])) {
                $product->scanned = $product->scanned + 1;
                $product->scanned_at = date("Y-m-d H:i:s");
                $product->update();

                logger()->info("Parse Google: {$product->name} [{$jsonArray['count']}] [" . __METHOD__ . "]");
                return true;
            }
        }

        logger()->info(" Parse Google: Error [" . __METHOD__ . "]");
        return false;
    }

    private function curlSendRequest($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($ch);
    }

    private $isNextPageExists = true;
    private $searchName = '';
    private $links = [];

    private function getLinksFromGoogle($productName, $force = null)
    {
        $this->searchName = $productName;

        if (!$force && $this->searchName) {
            return $this->isAlreadySearched($this->searchName);
        } else {
            $url = 'https://www.google.by/search?q=site:https://hifi-filter.com/en/catalog/+'
                . str_replace(' ', '+', $this->searchName)
                . '&rlz=1C1GCEU_ruBY848BY848&filter=0&biw=1920&bih=964';

            $pageIndex = 1;
            $this->links = [];
            do {
                $this->parseGooglePage($url, $pageIndex);
                $pageIndex++;

                sleep(rand(3, 6));
            } while ($this->isNextPageExists);

            return [
                'count' => count($this->links)
            ];
        }
    }

    private function isAlreadySearched($name)
    { // todo add continue
        $links = Link::where('search', $name)->get();
        if (count($links) > 0) {
            return ['status' => $name . ' - is already searched'];
        }
    }

    // TODO move to helper
    private function parseGooglePage($url, $i)
    {

        $fullUrl = $url . '&start=' . (($i - 1) * 10);
        $html = \Pharse::file_get_dom($fullUrl);

        $googleResultsOnPage = $html('body > #main > div > div > div > a');
        $countLinks = count($googleResultsOnPage);

        if ($i == 1 && $countLinks == 9) {
            $this->isNextPageExists = true;
        }
        if ($countLinks == 10) {
            $this->isNextPageExists = true;
        }
        if ($countLinks < 9) {
            $this->isNextPageExists = false;
        }

        foreach ($googleResultsOnPage as $index => $resultBlock) {

            if ($index == 0) {
                continue;
            }
            // TITLE
            $title = $resultBlock('div', 0)->getPlainText();

            $isFilterLink = false;
            if (explode(' ', $title)[0] == 'Filter') {
                $isFilterLink = true;
            }
            $title = trim(str_replace(['Filter', '- Hifi'], '', $title));

            // URL
            $hifiurl = $resultBlock->href;

            $hifiurl = str_replace('/url?q=', '', $hifiurl);
            $hifiurl = explode('&', $hifiurl)[0];

            if (strpos($hifiurl, 'm.hifi-filter.com') !== false) {
                $isFilterLink = false;
            }

            if ($isFilterLink) {
                $link = Link::firstOrCreate([
                    'url' => $hifiurl,
                ]);

                if (!$link->title) {
                    $link->update([
                        'title' => $title
                    ]);
                }

                if (!$link->search) {
                    $link->search = $this->searchName;
                };
            }

            array_push($this->links, $link);

            $link->search = $this->searchName;
            if ($link->check = !0) {
                $link->check = 0;
            }
            $link->save();
        }
        return $this->isNextPageExists;
    }
}
