<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_order_products', function (Blueprint $table) {
            $table->id();
            $table->double('price',45,2)->nullable();
            $table->integer('qty')->nullable();
            $table->bigInteger('raw_order_id')->unsigned()->nullable();
            $table->foreign('raw_order_id')->references('id')->on('raw_orders')->onDelete('cascade');
            $table->bigInteger('product_id')->unsigned()->nullable();
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
        Schema::dropIfExists('raw_order_products');
    }
}
