<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('store_id');
            $table->integer('user_id')->comment('(Creator) to allow in future that each admin is responsible for store')->index();
            $table->integer('logo_id')->comment('preview image')->index();
            $table->integer('cover_id')->comment('cover image');
            $table->text('slider_ids')->comment('photo gallery');
            $table->integer('city_id')->index();
            $table->integer('district_id')->comment('district related to city')->index();
            $table->string('map_lat',255);
            $table->string('map_lng',255);
            $table->decimal('deliver_in_range',12,2)->comment('if shipping_type = range_in_km , so range value in km is stored here');
            $table->integer('total_rates_count')->comment('total number of rates');
            $table->decimal('total_rates_avg',12,2)->comment('avg rates');
            $table->decimal('min_order_price',12,2);
            $table->integer('delivery_time')->comment('in minutes');
            $table->decimal('delivery_cost',12,2)->comment('value');
            $table->decimal('taxes_cost')->comment('percentage');
            $table->decimal('services_charges',12,2)->comment('percentage');
            $table->string('pricing_rate',20)->comment('low - middle - high');
            $table->integer('store_order');
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
        Schema::dropIfExists('stores');
    }
}
