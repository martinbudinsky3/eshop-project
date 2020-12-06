<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotNullConstraintOnCartIdInCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->bigInteger('product_design_id')->nullable(false)->change();
            $table->bigInteger('cart_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            //
        });
    }
}
