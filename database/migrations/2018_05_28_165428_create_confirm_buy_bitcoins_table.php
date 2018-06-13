<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmBuyBitcoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_buy_bitcoins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('bitcoin_id');
            $table->date('date_sent');
            $table->string('transfer_details');
            $table->integer('amount_paid');
            $table->string('depositor_name');
            $table->string('receipt_dir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirm_buy_bitcoins');
    }
}
