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
            $table->id();
            $table->string('name_fr')->nullable();
            $table->string('name_ar')->nullable();
            $table->text('desc_ar')->nullable();
            $table->text('desc_fr')->nullable();
            $table->text('image')->nullable();
            $table->string('ref')->nullable();
            $table->double('price_old',45,2)->nullable();
            $table->double('price',45,2)->nullable();
            $table->double('discount',45,2)->nullable();
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
        Schema::dropIfExists('products');
    }
}
