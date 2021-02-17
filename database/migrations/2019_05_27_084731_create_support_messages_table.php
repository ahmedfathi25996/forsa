<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('if he logged in')->index();
            $table->string('msg_type',20)->comment('support or bug')->index();
            $table->string('full_name',255);
            $table->string('phone',255)->comment('with code');
            $table->string('email',255);
            $table->text('message');
            $table->boolean('is_seen');
            $table->string('ip_address',20);
            $table->string('country',20);
            $table->string('timezone',20);
            $table->string('UDID',255);
            $table->string('device_type',20)->comment('samsung or iphone or oppo or ...');
            $table->string('device_name',255)->comment('samsung galaxy note 8 or iphone x or ...');
            $table->string('os_version',20)->comment('ios 11 or andriod ');
            $table->string('app_version',20)->comment('1.0.0');
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
        Schema::dropIfExists('support_messages');
    }
}
