<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse', function (Blueprint $table) {
            $table->id('id_warehouse');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('IMEI');
            $table->string('color');
            $table->integer('memory');
            $table->integer('price');
            $table->integer('warranty');
            $table->tinyInteger('active');
            $table->timestamps();
            $table->SoftDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse');
    }
}
