<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_product', function (Blueprint $table) {
            $table->index('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete("cascade");
            $table->index('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_product', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            $table->dropIndex(['cart_id']);
            $table->dropForeign(['product_id']);
            $table->dropIndex(['product_id']);
        });
    }
}
