<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $defaultLanguage = app()->getLocale();

            $table->id();
            $table->string('uri', 255);
            $table->string('lang', 2)->default($defaultLanguage);
            $table->string('title', 255)->nullable()->default(null);
            $table->timestamps();

            $table->unique(['uri', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metas');
    }
}
