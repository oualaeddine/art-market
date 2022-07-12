<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->text('desc_ar')->nullable();
            $table->string('short_dec_ar')->nullable();
            $table->string('logo_ar')->nullable();
            $table->string('name_fr')->nullable();
            $table->text('desc_fr')->nullable();
            $table->string('short_dec_fr')->nullable();
            $table->string('logo_fr')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
