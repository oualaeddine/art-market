<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('website_images');
        
        Schema::create('website_images', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('main_title')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('image')->nullable();
            $table->string('lang')->default('fr');
            $table->boolean('is_active')->default(1);
            $table->string('type')->default('product');
            $table->string('product_id')->nullable();
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
        Schema::dropIfExists('website_images');
    }
}
