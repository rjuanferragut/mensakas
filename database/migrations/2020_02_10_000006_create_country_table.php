<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_country')->unsigned();
		    $table->string('name', 100);
		    $table->integer('id_lang')->unsigned()->default('0');
		    $table->boolean('active')->unsigned()->default('0');
		    $table->string('iso_code', 3)->default('0');
		    $table->integer('call_prefix')->unsigned()->default('0');

		    $table->index('id_zone','fk_country_zones');
		    $table->index('id_lang','fk_country_language');

		    $table->foreign('id_lang')
		        ->references('id_language')->on('language')
		        ->onDelete('cascade')
		        ->onUpdate('cascade');

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
        Schema::dropIfExists('country');
    }
}
