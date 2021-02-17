<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('user_id')->comment('who make the order')->index();
            $table->integer('store_id')->index();
            $table->integer('driver_id')->index()->comment('driver that assigned to deliver this order');
            $table->string('order_status',20)->comment('waiting - process - shipping - delivered - rejected');
            $table->string('order_payment_status',10)->comment('paid or unpaid');
            $table->text('user_full_address')->comment('formatted full address to the user that is selected when make order');
            $table->string('user_map_lat',255);
            $table->string('user_map_lng',255);
            $table->integer('total_products_count');
            $table->decimal('total_products_price_before_discount',12,2);
            $table->decimal('total_products_discount',12,2)->comment('discount here is from offers if exist >> value not percent');
            $table->decimal('total_products_price_after_discount',12,2);
            $table->integer('promo_code_id')->comment('if used on order');
            $table->decimal('promo_code_value',12,2);
            $table->decimal('order_price_after_promo',12,2);
            $table->decimal('delivery_cost',12,2)->comment('value');
            $table->decimal('taxes_cost',12,2)->comment('percent');
            $table->decimal('total_order_taxes',12,2)->comment('value');
            $table->decimal('services_charges',12,2)->comment('percent');
            $table->decimal('total_order_services',12,2)->comment('value');
            $table->decimal('order_total_price',12,2)->comment('final price that user should pay it from wallet or on delivery or any payment gateway');
            $table->decimal('paid_from_wallet',12,2)->comment('if he use his wallet to pay full or partial');
            $table->decimal('order_remaining_price',12,2)->comment('remaining price that user should pay it on delivery or any payment gateway');
            $table->decimal('current_currency_rate',12,4)->comment('current order rate that used on conversion on paypal as example from SAR to USD rate');
            $table->integer('payment_method_id');
            $table->integer('payment_attach_file_id')->comment('attach bank transfer image file if payment_type = bank_transfer');
            $table->text('user_comment')->comment('any additional notes on the order');
            $table->date('order_custom_date')->comment('want order to deliver on specific date')->nullable();
            $table->time('order_custom_time')->comment('want order to deliver on specific time')->nullable();
            $table->boolean('is_rated');
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
        Schema::dropIfExists('orders');
    }
}
