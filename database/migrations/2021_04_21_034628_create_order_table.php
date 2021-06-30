<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('sale');
            $table->string('address')->nullable();
            $table->string('color')->nullable();
            $table->unsignedBigInteger('transaction_id')->nullable()->index()->default(0);
            $table->foreign('transaction_id')->references('id_transaction')->on('transaction')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable()->index()->default(0);
            $table->foreign('product_id')->references('id_product')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('order');
    }
}
