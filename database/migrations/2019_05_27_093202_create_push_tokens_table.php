<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePushTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->text('push_token');
            $table->string('UDID');
            $table->string('ip_address',20);
            $table->string('country',20)->comment('from IP');
            $table->string('device_type',20)->comment('android or ios')->index();
            $table->string('device_name')->comment('samsung galaxy note 8 or iphone x or ...');
            $table->string('os_version')->comment('ios 11 or android 9');
            $table->string('app_version',20)->comment('1.0.0');
            $table->timestamp('last_login_date')->nullable();
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
        Schema::dropIfExists('push_tokens');
    }
}
