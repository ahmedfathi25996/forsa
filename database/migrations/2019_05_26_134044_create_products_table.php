<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('store_id')->index();
            $table->integer('cat_id')->index();
            $table->integer('product_img_id')->comment('for preview');
            $table->text('slider_ids')->comment('photo gallery');
            $table->integer('number_of_persons')->comment('enough to number or x person');
            $table->string('barcode',255);
            $table->integer('preparation_time')->comment('in minutes');
            $table->boolean('is_active');
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
        Schema::dropIfExists('products');
    }
}
