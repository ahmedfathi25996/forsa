<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_code',500)->index();
            $table->string('user_type',50)->comment('dev or admin or user')->index();
            $table->integer('logo_id', false, true);
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('full_name',200);
            $table->string('email',100)->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('phone_code',10);
            $table->string('phone',20)->index();
            $table->string('verification_code',4);
            $table->timestamp('verification_code_expiration')->nullable();
            $table->boolean('is_verified');
            $table->boolean('is_active')->default(1);
            $table->decimal('user_wallet',12,2)->unsigned()->comment('his wallet on system that can pay from it or receive money on it');
            $table->integer('user_points')->comment('his points on system that can convert it to money added to wallet');
            $table->string('user_plan')->comment('free or membership');
            $table->text('serial_number');
            $table->string('ip_address',20)->comment('from registration');
            $table->string('country',20)->comment('from IP');
            $table->string('timezone',100)->comment('from IP');
            $table->timestamp('last_login_date')->nullable();
            $table->integer('display_lang_id', false, true)->comment('for admin control and display language');
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
        Schema::dropIfExists('users');
    }
}
