<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoryHierarchiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_hierarchies', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('main_category');
            $table->dropColumn('sub_category');
            $table->bigInteger('parent_category_id');
            $table->bigInteger('child_category_id');
            $table->foreign('parent_category_id')->references('id')->on('categories');
            $table->foreign('child_category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('=category_hierarchies', function (Blueprint $table) {
            //
        });
    }
}
