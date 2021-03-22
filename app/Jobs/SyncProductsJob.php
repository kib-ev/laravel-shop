<?php

namespace App\Jobs;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\RemoteProduct;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $syncCount;

    /**
     * Create a new job instance.
     *
     * @param int $syncCount
     */
    public function __construct($syncCount = 100)
    {
        $this->syncCount = $syncCount;
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

//        if ($remoteProductsCount > $productsCount) {


            $lastProduct = Product::orderBy('id', 'desc')->first();
            $lastId = $lastProduct ? $lastProduct->id : 0;

            $remoteProducts = RemoteProduct::where('id', '>', $lastId)
                ->limit($this->syncCount)
                ->get();

            $this->syncProducts($remoteProducts);
//        }

        $productsIds = Product::select('id')->whereNull('search')->orWhere('search', '')->get()->pluck('id')->toArray();
        if (count($productsIds)) {
            $remoteProducts = RemoteProduct::whereIn('id', $productsIds)->get();
            $this->syncProducts($remoteProducts);
        }
    }

    protected function syncProducts($remoteProducts)
    {

        foreach ($remoteProducts as $remoteProduct) {
            $product = Product::firstOrCreate([
                'id' => $remoteProduct->id
            ], [
                'name' => $remoteProduct->name,
                'search' => $remoteProduct->search,
            ]);

            $product->remote;

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
