<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZonesTable extends Migration
{
  public function up()
     {
 		Schema::create('zones', function(Blueprint $table) {
 		    $table->engine = 'InnoDB';

 		    $table->increments('id_zone')->unsigned();
 		    $table->string('name', 64)->default('');
 		    $table->integer('zipcode')->default('0');
 		    $table->boolean('active')->default('0');

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
 		Schema::drop('zones');

     }
}
