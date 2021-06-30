<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnForeignKeyTransactionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id')->nullable()->unsigned();        
            $table->foreign('transaction_id')->references('id_transaction')->on('transaction')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable()->unsigned();        
            $table->foreign('product_id')->references('id_product')->on('products')->onDelete('cascade');
            $table->dropForeign(['product_type_id']);
            $table->dropColumn('product_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropForeign(['transaction_id']);
            $table->dropForeign(['product_id']);
        });
    }
}
