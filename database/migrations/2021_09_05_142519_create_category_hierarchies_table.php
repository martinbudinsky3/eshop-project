<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryHierarchiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_hierarchies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_category_id');
            $table->unsignedBigInteger('child_category_id');
            $table->foreign('parent_category_id')->references('id')->on('categories');
            $table->foreign('child_category_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_hierarchies');
    }
}
