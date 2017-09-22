<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_word', function (Blueprint $table) {
        	$table->integer('category_id')->unsigned()->nullable();
        	$table->foreign('category_id')->references('id')
        	->on('categories')->onDelete('cascade');
        	
        	$table->integer('word_id')->unsigned()->nullable();
        	$table->foreign('word_id')->references('id')
        	->on('words')->onDelete('cascade');
        	
        	$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_word');
    }
}
