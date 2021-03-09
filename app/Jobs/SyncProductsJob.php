<?php

namespace App\Jobs;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\RemoteProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->syncProductsCount();
    }

    protected function syncProductsCount()
    {
        $remoteProductsCount = RemoteProduct::count();
        $productsCount = Product::count();

        if ($remoteProductsCount > $productsCount) {

            $ids = Product::select('id')->get()->pluck('id');

            $remoteProducts = RemoteProduct::whereNotIn('id', $ids)
                ->limit(500)
                ->get();

            $this->syncProducts($remoteProducts);
        }
    }

    protected function syncProducts($remoteProducts)
    {
        foreach ($remoteProducts as $remoteProduct) {
            $product = Product::firstOrCreate([
                'id' => $remoteProduct->id
            ], [
                'name' => $remoteProduct->name
            ]);

//            $product->name = $remoteProduct->name;

            if ($remoteProduct->group->name) {
                $remoteBrand = ProductCategory::firstOrCreate([
                    'name' => $remoteProduct->group->type
                ]);
                $product->category_id = $remoteBrand->id;
            }

            if ($remoteProduct->brand->name) {
                $brand = Brand::firstOrCreate([
                    'name' => $remoteProduct->brand->name,
                    'slug' => $remoteProduct->brand->slug,
                ]);
                $product->brand_id = $brand->id;
            }

            $product->update();
        }
    }

}
