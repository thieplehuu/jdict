<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('meanings', function(Blueprint $table) {
    		$table->integer('id')->unsigned();
    		$table->integer('word_id')->foreign('word_id')
    		->references('id')->on('words')
    		->onDelete('cascade');
    		$table->string('meaning');
    		$table->text('examples');
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
        //
    }
}
