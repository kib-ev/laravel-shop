<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $defaultLanguage = app()->getLocale();

            $table->string('lang', 2)->default($defaultLanguage);
            $table->string('slug');
            $table->text('name')->nullable()->default(null);
            $table->text('content')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->dropColumn('name');
            $table->dropColumn('slug');
            $table->dropColumn('lang');
        });
    }
}
