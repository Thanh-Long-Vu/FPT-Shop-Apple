<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('id_rating');
            $table->integer('number');
            $table->tinyInteger('active')->default(0);
            $table->string('content');
            $table->unsignedBigInteger('user_id')->nullable()->index()->default(0);
            $table->unsignedBigInteger('product_type_id')->nullable()->index()->default(0);
            $table->foreign('user_id')->references('id_user')->on('users');
            $table->foreign('product_type_id')->references('id_product_type')->on('product_types')->onDelete('cascade');
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
        Schema::dropIfExists('ratings');
    }
}
