<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores_translate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->index();
            $table->string('store_name',255)->index();
            $table->text('store_description');
            $table->text('store_notes')->comment('to note about something new or offer or active');
            $table->string('store_meta_title',255);
            $table->text('store_meta_description');
            $table->text('store_meta_keywords');
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
        Schema::dropIfExists('stores_translate');
    }
}
