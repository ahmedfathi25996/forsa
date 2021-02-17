<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_translate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->index();
            $table->string('page_title',255);
            $table->string('page_slug',255);
            $table->longText('page_body');
            $table->string('page_meta_title',255);
            $table->text('page_meta_description');
            $table->text('page_meta_keywords');
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
        Schema::dropIfExists('pages_translate');
    }
}
