<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_translate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->index();
            $table->string('city_name');
            $table->string('city_meta_title');
            $table->text('city_meta_description');
            $table->text('city_meta_keywords');
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
        Schema::dropIfExists('city_translate');
    }
}
