<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_reviews', function (Blueprint $table) {
            $table->increments('review_id');
            $table->integer('user_id')->comment('who make the review')->index();
            $table->integer('order_id')->index();
            $table->decimal('rate_value',4,2);
            $table->text('comment');
            $table->boolean('is_reviewed');
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
        Schema::dropIfExists('orders_reviews');
    }
}
