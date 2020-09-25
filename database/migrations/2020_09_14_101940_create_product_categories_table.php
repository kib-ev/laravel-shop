<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->default('0');
            $table->string('name', 255);
            $table->string('image_path', 255)->default('');
            $table->string('parser_link', 255)->unique();
            $table->text('excerpt')->nullable()->default(null); // TODO: find fix for linux default('')
            $table->text('description')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();

            // foreign keys // TODO: add foreign key
//            Schema::table('products', function ($table) {
//                $table->foreign('category_id')
//                    ->references('id')
//                    ->on('product_categories');
//                // ->onDelete('cascade');
//            });

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}
