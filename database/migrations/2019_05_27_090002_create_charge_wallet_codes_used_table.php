<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeWalletCodesUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_wallet_codes_used', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id')->index();
            $table->integer('user_id')->index();
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
        Schema::dropIfExists('charge_wallet_codes_used');
    }
}
