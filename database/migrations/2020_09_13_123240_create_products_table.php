<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('model', 255)->default('');
            $table->string('article', 255)->default('');
            $table->bigInteger('category_id')->unsigned()->nullable()->default(null);
            $table->string('image_path', 255)->default('');
            $table->text('excerpt');
            $table->text('description');
            $table->integer('count')->unsigned()->default(0);
            $table->double('price', 8, 2)->unsigned()->default(0.00);
            $table->double('price_old', 8, 2)->unsigned()->default(0.00);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
