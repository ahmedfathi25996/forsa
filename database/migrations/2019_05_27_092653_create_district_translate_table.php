<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_translate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district_id')->index();
            $table->string('district_name');
            $table->string('district_meta_title');
            $table->text('district_meta_description');
            $table->text('district_meta_keywords');
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
        Schema::dropIfExists('district_translate');
    }
}
