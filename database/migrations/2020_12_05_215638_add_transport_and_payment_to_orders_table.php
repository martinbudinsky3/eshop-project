<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransportAndPaymentToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('transport_id');
            $table->bigInteger('payment_id');

            $table->foreign('transport_id')->references('id')->on('transports');
            $table->foreign('payment_id')->references('id')->on('payments');
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
