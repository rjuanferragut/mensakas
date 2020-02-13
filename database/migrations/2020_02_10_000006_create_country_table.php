<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{

    public function up() {
        Schema::create('country', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

<<<<<<< HEAD
        $table->increments('id_country')->unsigned();
=======
		    $table->increments('id_country')->unsigned();
>>>>>>> 66a411805275504ef0f5c1beed3c02bf4341ad7d
		    $table->string('name', 100);
		    $table->integer('id_lang')->unsigned()->default('0');
		    $table->boolean('active')->unsigned()->default('0');
		    $table->string('iso_code', 3)->default('0');
		    $table->integer('call_prefix')->unsigned()->default('0');

		    $table->index('id_lang','fk_country_language');

		    $table->foreign('id_lang')
		        ->references('id_language')->on('language')
		        ->onDelete('cascade')
		        ->onUpdate('cascade');

		    $table->timestamps();
		    });
    }

    public function down() {
        Schema::dropIfExists('country');
    }
}
