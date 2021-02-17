<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_working_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->index();
            $table->integer('day_id')->index();
            $table->time('time_from')->comment('9:00 AM');
            $table->time('time_to')->comment('6:00 AM');
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
        Schema::dropIfExists('store_working_days');
    }
}
