<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCouponClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_coupons', function (Blueprint $table) {
             $table->dropColumn('is_active');
            if (Schema::hasColumn('client_coupons', 'coupon_id')) {
                $table->dropConstrainedForeignId('coupon_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_coupons', function (Blueprint $table) {
            //
        });
    }
}
