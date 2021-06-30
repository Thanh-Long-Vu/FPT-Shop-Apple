<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->id('id_product_type');
            $table->string('name');
            $table->tinyInteger('active')->default(0);
            $table->string('description');
            $table->longText('data');
            $table->string('thumbnail');
            $table->integer('total_number')->nullable();
            $table->double('total_rating')->nullable();
            $table->integer('warranty')->nullable();
            $table->unsignedBigInteger('category_id')->nullable()->index()->default(0);
            $table->foreign('category_id')->references('id_category')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('product_types');
    }
}
