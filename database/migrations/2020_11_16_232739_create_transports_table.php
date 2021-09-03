<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// TODO maybe remove this migration
class CreateTransportsTable extends Migration
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
            $table->timestamps();
        });

        // TODO move to seeder
        DB::table('transports')->insert(array('id' => 1, 'name' => 'Osobný odber',));
        DB::table('transports')->insert(array('id' => 2, 'name' => 'Doručenie kuriérom',));
        DB::table('transports')->insert(array('id' => 3, 'name' => 'Pošta',));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transports');
    }
}
