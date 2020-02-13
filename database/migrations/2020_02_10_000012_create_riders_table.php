<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidersTable extends Migration
{
    public function up()  {
      Schema::create('riders', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->integer('id_rider')->unsigned();
  		    $table->integer('id_employee')->unsigned();
  		    $table->integer('id_vehicle')->unsigned();
          $table->integer('id_zone')->unsigned();
  		    $table->boolean('active')->default('0');
  		    $table->integer('max_travel')->default('0');

  		    $table->primary('id_rider');

  		    $table->index('id_employee','id_employee');
  		    $table->index('id_vehicle','id_vehicle');
  		    $table->index('id_zone','id_zone');

  		    $table->foreign('id_employee')
  		        ->references('id_employee')->on('employees')
  		        ->onDelete('cascade')
  		        ->onUpdate('cascade');

          $table->foreign('id_vehicle')
              ->references('id_vehicle')->on('vehicles')
              ->onDelete('cascade')
              ->onUpdate('cascade');


          $table->foreign('id_zone')
              ->references('id_zone')->on('zones')
              ->onDelete('cascade')
              ->onUpdate('cascade');

  		    $table->timestamps();
  		});
  }

      public function down()  {
  		    Schema::drop('riders');

      }
}
