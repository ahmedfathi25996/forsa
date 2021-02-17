<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->increments('address_id');
            $table->integer('user_id')->index();
            $table->integer('city_id')->index();
            $table->integer('district_id')->index();
            $table->string('address_title');
            $table->string('street_name_number');
            $table->string('build_name_number');
            $table->string('floor', 50);
            $table->string('flat', 50);
            $table->string('lat');
            $table->string('lng');
            $table->text('additional_info');
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
        Schema::dropIfExists('user_address');
    }
}
