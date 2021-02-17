<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('not_id');
            $table->integer('from_user_id')->comment('who fire the notification');
            $table->string('to_user_type',20)->comment('(all or specific) admin');
            $table->integer('to_user_id')->comment('if to_user_type is specific')->index();
            $table->string('not_type',255)->comment('based on action like order or review or ...')->index();
            $table->integer('target_id')->comment('based on action like order_id or review_id or ...');
            $table->string('not_title',255)->comment('notification itself');
            $table->string('not_priority')->comment('low or medium or high');
            $table->boolean('is_seen');
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
        Schema::dropIfExists('notifications');
    }
}
