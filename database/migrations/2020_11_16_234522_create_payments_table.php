<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('payments')->insert(array('id' => 1, 'name' => 'Kartou online',));
        DB::table('payments')->insert(array('id' => 2, 'name' => 'VúB e-platby',));
        DB::table('payments')->insert(array('id' => 3, 'name' => 'Platba kuriérovi',));
        DB::table('payments')->insert(array('id' => 4, 'name' => 'Bankový prevod',));
        DB::table('payments')->insert(array('id' => 5, 'name' => 'Kredit',));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
