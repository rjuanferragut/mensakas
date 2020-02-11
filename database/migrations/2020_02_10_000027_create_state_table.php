<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateTable extends Migration
{
  public function up()
    {
		Schema::create('state', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_state')->unsigned();
		    $table->integer('id_country')->unsigned();
		    $table->integer('id_zone')->unsigned();
		    $table->string('name', 64)->default(null);
		    $table->boolean('active')->default('0');

		    $table->index('id_state','id_state');
		    $table->index('id_country','id_country');
		    $table->index('id_zone','id_zone');

		    $table->foreign('id_zone')
		        ->references('id_zone')->on('zones')
		        ->onDelete('cascade')
		        ->onUpdate('cascade');

        $table->foreign('id_country')
    		    ->references('id_country')->on('country')
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
		Schema::drop('state');

    }
}
