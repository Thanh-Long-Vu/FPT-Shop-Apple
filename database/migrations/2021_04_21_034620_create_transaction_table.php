<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id('id_transaction');
            $table->integer('total_price')->nullable();
            $table->tinyInteger('method_receive')->default(0);
            $table->tinyInteger('status');
            $table->unsignedBigInteger('user_id')->nullable()->index()->default(0);
            $table->foreign('user_id')->references('id_user')->on('users');
            $table->unsignedBigInteger('payment_method_id')->nullable()->index()->default(0);
            $table->foreign('payment_method_id')->references('id_payment_method')->on('payment_method');
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
        Schema::dropIfExists('transaction');
    }
}
