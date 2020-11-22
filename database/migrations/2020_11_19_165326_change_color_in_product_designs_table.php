<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColorInproduct_designsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_designs', function (Blueprint $table) {
            $table->dropColumn('color');
            $table->foreignId('color_id');
            $table->string('size')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_designs', function (Blueprint $table) {
            //
        });
    }
}
