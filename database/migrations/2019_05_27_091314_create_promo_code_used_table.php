<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodeUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code_used', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id')->index();
            $table->integer('user_id')->index();
            $table->integer('order_id');
            $table->string('old_code_type',15)->comment('percent or value');
            $table->decimal('old_code_value',12,2);
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
        Schema::dropIfExists('promo_code_used');
    }
}
