<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_offers', function (Blueprint $table) {
            $table->increments('offer_id');
            $table->integer('offer_img_id');
            $table->integer('store_id')->index();
            $table->integer('product_id')->index();
            $table->integer('option_id')->index();
            $table->string('discount_type',20)->comment('percent or value');
            $table->decimal('discount_value',12,2);
            $table->dateTime('offer_start');
            $table->dateTime('offer_end');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('store_offers');
    }
}
