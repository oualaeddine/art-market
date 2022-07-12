<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE `orders` CHANGE `client` `client` BIGINT(20) UNSIGNED NULL');
            $table->string('last_name')->nullable();
            $table->foreignId('wilaya_id')->nullable()->constrained('yalidine_wilayas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
