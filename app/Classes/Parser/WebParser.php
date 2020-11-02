<?php

namespace App\Classes\Parser;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Pharse;

class WebParser
{
    public static function updateProductData($product)
    {
        $content = file_get_contents($product->parser_link);
        $html = Pharse::str_get_dom($content);

//        $description = $html('.product-page-description', 0)->getOuterText();

        $imageUri = $html('.p-card__img > a.fancybox', 0)->getAttribute('href');
        $imageUrl = 'https://evro-laminat.ru'. $imageUri;
        $imagePath = self::saveProductImageToStorage($product->id, $imageUrl);

        $properties = $html('.property-list', 0)->getOuterText();

        $product->update([
            'image_path' => $imagePath,
            'description' => $properties,
        ]);
    }

    public static function updateCategoryData()
    {
        // TODO: Implement updateCategoryData() method.
    }

    public static function saveProductImageToStorage($fileName, $url)
    {
        $file = file_get_contents($url);
        $fileInfo = pathinfo($url);

        $newFileName = "{$fileName}.{$fileInfo['extension']}";

        $filePathOriginal = "images/products/original/$newFileName";
        Storage::disk('public')->put($filePathOriginal, $file);

        return $filePathOriginal;
    }

    public function getCategories() {
        $categoriesArray = [
            'Ламинат' => 'https://evro-laminat.ru/laminat/',
            'Паркетная доска' => 'https://evro-laminat.ru/parketnaya-doska/',
            'Массивная доска' => 'https://evro-laminat.ru/massivnaya-doska/',
            'Пробковые полы' => 'https://evro-laminat.ru/probkovye-poly/',
            'Настенная пробка' => 'https://evro-laminat.ru/nastennaya-probka/',
            'Виниловый пол' => 'https://evro-laminat.ru/vinilovye-poly/',
            'Мармолеум' => 'https://evro-laminat.ru/marmoleum/',
            'Террасная доска' => 'https://evro-laminat.ru/terrasnaya-doska/',
            'Инженерная доска' => 'https://evro-laminat.ru/inzhenernaya-doska/',
            'Линолеум' => 'https://evro-laminat.ru/linoleum/',
            'Подложка' => 'https://evro-laminat.ru/podlozhka/',
            'Плинтус' => 'https://evro-laminat.ru/plintus/',
            'Пороги' => 'https://evro-laminat.ru/porogi-dlya-pola/',
            'Паркетная химия' => 'https://evro-laminat.ru/parketnaya-himiya/',
            'Фанера' => 'https://evro-laminat.ru/fanera-dlya-pola/',
            'Аксессуары' => 'https://evro-laminat.ru/aksessuary/',
            'Подоконник' => 'https://evro-laminat.ru/podokonniki/',
            'Дверные ручки' => 'https://evro-laminat.ru/dvernye-ruchki/',
        ];

        foreach ($categoriesArray as $name => $link) {
            $category = ProductCategory::firstOrCreate([
                'name' => $name,
                'parser_link' => $link,
            ]);
        }
    }

    public function getProductsLinksFromPage($url) {
        $content = file_get_contents($url);
        $html = Pharse::str_get_dom($content);

        $productsHtml = $html('.product-list .product');


        foreach ($productsHtml as $productHtml) {
            $name = $productHtml('.product__title', 0)->getPlainText();
            $link = $productHtml('.product__desc a', 0)->getAttribute('href');
            $price = $productHtml('.product__footer > div > span', 0)->getPlainText();
            $image = $productHtml('.product__img > a > img', 0)->getAttribute('src');

            $product = Product::firstOrCreate([
                'parser_link' => 'https://evro-laminat.ru'.$link,
            ], [
//                'price' => str_replace([' '], '', $price),
                'image_path' => 'https://evro-laminat.ru'.$image,
                'name' => $name,
            ]);

            $product->update();
        }
    }
}
