<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropConstrainedForeignId('wilaya_id');
            $table->dropConstrainedForeignId('commune_id');
            $table->dropColumn('wilaya');
            $table->dropColumn('commune');
            $table->dropColumn('address');
            $table->dropColumn('name');
            $table->dropColumn('phone');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
