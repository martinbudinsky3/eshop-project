<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
        });

        // TODO move to seeder
        DB::table('brands')->insert(array('id' => 1, 'name' => 'Esmara',));
        DB::table('brands')->insert(array('id' => 2, 'name' => 'ONLY',));
        DB::table('brands')->insert(array('id' => 3, 'name' => 'H&M',));
        DB::table('brands')->insert(array('id' => 4, 'name' => 'Fashionweek',));
        DB::table('brands')->insert(array('id' => 5, 'name' => 'RAINBOW',));
        DB::table('brands')->insert(array('id' => 6, 'name' => 'bpc',));
        DB::table('brands')->insert(array('id' => 7, 'name' => 'H&M kids',));
        DB::table('brands')->insert(array('id' => 8, 'name' => 'Happy kids',));
        DB::table('brands')->insert(array('id' => 9, 'name' => 'emoji',));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
