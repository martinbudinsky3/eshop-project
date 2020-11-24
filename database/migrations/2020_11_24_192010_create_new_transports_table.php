<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->timestamps();
        });

        DB::table('transports')->insert(array('id' => 1, 'name' => 'Osobný odber','price' => '0',));
        DB::table('transports')->insert(array('id' => 2, 'name' => 'Doručenie kuriérom','price' => '4.60',));
        DB::table('transports')->insert(array('id' => 3, 'name' => 'Pošta','price' => '1.70',));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_transports');
    }
}