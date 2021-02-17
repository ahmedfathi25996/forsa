<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeWalletCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_wallet_codes', function (Blueprint $table) {
            $table->increments('code_id');
            $table->string('code_text',255)->comment('code itself')->index();
            $table->dateTime('expire_at');
            $table->decimal('code_value',12,2);
            $table->boolean('is_used');
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
        Schema::dropIfExists('charge_wallet_codes');
    }
}
