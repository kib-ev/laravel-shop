<?php

namespace App\Classes\Parser;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Pharse;

class WebParserPostroykaBy
{

    public $site = 'https://www.postroyka.by';
    private $isNextPageExists = true;
    private $searchName = '';
    private $links = [];

    public static function updateProductData(Product $product)
    {
        $webParser = new WebParserPostroykaBy();
        $url = $webParser->site . $product->parser_link;
        $data = $webParser->parseProductData($url, $product->id);

        $product->update($data);
    }

    private function parseProductData($url, $productId)
    {
        $content = file_get_contents($url);
        $html = Pharse::str_get_dom($content);

//        if ($html('.price > li > span.old_price', 0)) {
//            $oldPrice = $html('.price > li > span.old_price', 0)->getPlainText();
//            $price = $html('.price > li > span', 1)->getPlainText();
//        } else {
//            $oldPrice = 0;
//            $price = $html('.price > li > span', 0)->getPlainText();
//        }

        $imgPath = $html('.img img', 0)->getAttribute('src');

        $fileInfo = pathinfo($imgPath);
        $file = file_get_contents($imgPath);
        $newFilePath = "images/{$productId}.{$fileInfo['extension']}";
        Storage::disk('public')->put($newFilePath, $file);

        $description = $html('.blk_body .tab', 0)->getInnerText();


        // remove links from content
        $descriptionNoLinks = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $description);

        $data = array(
                'image_path' => Storage::url($newFilePath),
//            'name' => trim($html('h1.heading', 0)->getPlainText()),
            'description' => $descriptionNoLinks,
//            'price_old' => str_replace('р.', '', $oldPrice),
//            'price' => str_replace('р.', '', $price),
        );

        return $data;
    }

    public static function collectCategories()
    {
        $webParser = new WebParserPostroykaBy();
        $webParser->parseCategories($webParser->site);
    }

    private function parseCategories($url)
    {
        $content = file_get_contents($url);
        $html = Pharse::str_get_dom($content);

        $menuItems = $html('ul.categories_nav > li');

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

    public static function collectProducts()
    {
        $webParser = new WebParserPostroykaBy();

        $productsAll = collect();
        foreach (ProductCategory::all() as $category) {
            if (!$category->hasChildren()) {
                $url = $webParser->site . $category->parser_link;
                $products = $webParser->parseProductsFromSingleCategoryPage($url);

                foreach ($products as $product) {
                    $product->category_id = $category->id;
                }

                $productsAll = $productsAll->merge($products);
            }
        }

        foreach ($productsAll as $product) {
            if (!$product->category->hasChildren())
                $product->save();
        }

    }

    public function parseProductsFromSingleCategoryPage($url, $categoryId = null)
    {
        $content = file_get_contents($url);
        $html = Pharse::str_get_dom($content);

        $htmlProducts = $html('.products_blk .mini_catalog .col_12');

        $products = collect();
        foreach ($htmlProducts as $htmlProduct) {

            $measure = $htmlProduct('.basePrice > span', 0)->getPlainText();
            $price = str_replace($measure, '', $htmlProduct('.basePrice', 0)->getPlainText());

            $product = new Product([
                'measure' => $measure,
                'price' => trim(str_replace(',', '.', $price)),
                'name' => $htmlProduct('a', 1)->getPlainText(),
                'parser_link' => $htmlProduct('a', 0)->getAttribute('href'),
                'image_path' => $htmlProduct('img', 0)->getAttribute('src'),
                'category_id' => $categoryId,
            ]);

            $products->add($product);
        }

        return $products;
    }
}
