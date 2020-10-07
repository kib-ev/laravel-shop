<?php

namespace App\Classes\Parser;

use App\Models\Product;
use App\Models\ProductCategory;
use Pharse;

class WebParser
{

    private $isNextPageExists = true;
    private $searchName = '';
    private $links = [];

    private $site = 'http://1000-stroy.by/';

    public static function updateProductData(Product $product)
    {
        $webParser = new WebParser();
        $product->update($webParser->parseProductData($product->parser_link));
    }

    public static function collectCategories() {
        $webParser = new WebParser();
        $webParser->parseCategories($webParser->site);
    }

    public static function collectProducts() {
        $webParser = new WebParser();

        $productsAll = collect();
        foreach (ProductCategory::all() as $category) {
            $url = $category->parser_link . '?limit=100';
            $products = $webParser->parseProductsFromSingleCategoryPage($url);

            foreach ($products as $product) {
                $product->category_id = $category->id;
            }

            $productsAll = $productsAll->merge($products);
        }

        foreach ($productsAll as $product) {
            if (!$product->category->hasChildren())
                $product->save();
        }

    }

    private function parseCategories($url)
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

    private function parseProductsFromSingleCategoryPage($url)
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

            $product = new Product([
                'name' => $htmlProduct('a', 1)->getPlainText(),
                'parser_link' => $htmlProduct('a', 1)->getAttribute('href'),
                'image_path' => $htmlProduct('img', 0)->getAttribute('src'),
                'price' => $price,
            ]);


            $products->add($product);
        }

        return $products;
    }

    private function parseProductData($url)
    {
        $content = file_get_contents($url);
        $html = Pharse::str_get_dom($content);

        if ($html('.price > li > span.old_price', 0)) {
            $oldPrice = $html('.price > li > span.old_price', 0)->getPlainText();
            $price = $html('.price > li > span', 1)->getPlainText();
        } else {
            $oldPrice = 0;
            $price = $html('.price > li > span', 0)->getPlainText();
        }

        $description = $html('#tab-description', 0)->getInnerText();
        // remove links from content
        $descriptionNoLinks = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $description);

        $data = array(
            'name' => trim($html('h1.heading', 0)->getPlainText()),
            'description' => $descriptionNoLinks,
            'price_old' => str_replace('р.', '', $oldPrice),
            'price' => str_replace('р.', '', $price),
        );

        return $data;
    }
}
