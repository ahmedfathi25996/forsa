<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code', function (Blueprint $table) {
            $table->increments('code_id');
            $table->string('code_text',255)->comment('code itself')->index();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('code_type',15)->comment('percent or value');
            $table->decimal('code_value',12,2);
            $table->boolean('is_active');
            $table->integer('number_of_uses');
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
        Schema::dropIfExists('promo_code');
    }
}
