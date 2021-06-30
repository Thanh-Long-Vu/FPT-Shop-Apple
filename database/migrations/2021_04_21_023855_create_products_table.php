<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('thumbnail');
            $table->string('color');
            $table->string('name');
            $table->integer('price');
            $table->string('memory');
            $table->integer('IMEI');
            $table->tinyInteger('active')->default(0);
            $table->integer('quantity');
            $table->integer('discount')->nullable();
            $table->tinyInteger('is_hot')->default(0);
            $table->tinyInteger('active_quantity');
            $table->unsignedBigInteger('product_type_id')->nullable()->index()->default(0);
            $table->foreign('product_type_id')->references('id_product_type')->on('product_types')->onDelete('cascade');
            $table->unsignedBigInteger('warehouse_id')->nullable()->index()->default(0);
            $table->foreign('warehouse_id')->references('id_warehouse')->on('warehouse')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
