<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewPaymentsTable extends Migration
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
            $table->float('price');
            $table->timestamps();
        });

        DB::table('payments')->insert(array('id' => 1, 'name' => 'Kartou online','price'=> '0',));
        DB::table('payments')->insert(array('id' => 2, 'name' => 'VúB e-platby','price'=> '0',));
        DB::table('payments')->insert(array('id' => 3, 'name' => 'Platba kuriérovi','price'=> '3.60',));
        DB::table('payments')->insert(array('id' => 4, 'name' => 'Bankový prevod','price'=> '0',));
        DB::table('payments')->insert(array('id' => 5, 'name' => 'Kredit','price'=> '0',));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_payments');
    }
}
