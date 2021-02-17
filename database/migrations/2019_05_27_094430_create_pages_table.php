<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('page_id');
            $table->integer('small_img_id')->comment('for preview');
            $table->integer('big_img_id')->comment('for entire page');
            $table->text('page_slider')->comment('json slider imgs');
            $table->string('page_type')->comment('default or article')->index();
            $table->boolean('hide_page');
            $table->integer('page_order');
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
        Schema::dropIfExists('pages');
    }
}
