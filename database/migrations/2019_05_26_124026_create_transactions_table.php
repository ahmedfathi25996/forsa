<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->integer('user_id')->comment('who made the transaction')->index();
            $table->integer('order_id')->index();
            $table->integer('payment_method_id');
            $table->string('transaction_type',40)->comment('paid or refund');
            $table->decimal('amount',12,2);
            $table->text('request_json');
            $table->text('response_json');
            $table->string('payment_id',255);
            $table->text('description');
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
        Schema::dropIfExists('transactions');
    }
}
