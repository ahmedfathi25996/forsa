<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreCategoriesTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_categories_translate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->index();
            $table->string('cat_name',255)->index();
            $table->text('cat_description');
            $table->string('cat_meta_title',255);
            $table->text('cat_meta_description');
            $table->text('cat_meta_keywords');
            $table->integer('lang_id')->index();
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
        Schema::dropIfExists('store_categories_translate');
    }
}
