<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function (Blueprint $table) {
            $table->increments('order_product_id');
            $table->integer('order_id')->index();
            $table->integer('product_id')->index();
            $table->integer('option_id')->index();
            $table->string('old_option_type',20)->comment('main or addition');
            $table->decimal('option_unit_price',12,2);
            $table->integer('item_count');
            $table->decimal('option_items_price',12,2);
            $table->integer('offer_id')->comment('if used');
            $table->string('old_offer_discount_type',20)->comment('percent or value');
            $table->decimal('old_offer_discount_value',12,2)->comment('value itself');
            $table->decimal('option_items_total_discount',12,2)->comment('value');
            $table->decimal('total_price',12,2);
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
        Schema::dropIfExists('orders_products');
    }
}
