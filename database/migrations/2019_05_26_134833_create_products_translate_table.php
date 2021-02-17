<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_translate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->index();
            $table->string('product_name',255)->index();
            $table->text('product_description');
            $table->string('product_meta_title',255);
            $table->text('product_meta_description');
            $table->text('product_meta_keywords');
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
        Schema::dropIfExists('products_translate');
    }
}
