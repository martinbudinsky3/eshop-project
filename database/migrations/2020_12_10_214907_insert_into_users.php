<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertIntoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            //heslo pre admina je HesloAdmin
        DB::insert('insert into users (id,name,email,password,phone) values (?,?, ?,?,?)', [11,'ADMIN','admin@mail.sk','$2y$10$tBD/K6sAvXqEqx4PEqXB6u2mO2jxm1jP4EvYEATlA83l4CvjLh0le', 'PHONE admin']);
        DB::insert('insert into role_user(role_id, user_id) values(?,?)',  [1, 11]);
        //
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
