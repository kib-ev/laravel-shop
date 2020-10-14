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
            $table->string('parser_link', 255)->default('');
            $table->string('article', 255)->default('');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('image_path', 255)->default('');
            $table->text('excerpt')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->integer('count')->unsigned()->default(0);
            $table->string('measure')->nullable()->default(null);
            $table->double('price', 8, 2)->unsigned()->default(0.00);
            $table->double('price_old', 8, 2)->unsigned()->default(0.00);

            $table->boolean('featured')->default(0);

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
