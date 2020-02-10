<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('riders', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->integer('id_rider')->unsigned();
  		    $table->integer('id_employee')->unsigned();
  		    $table->integer('id_vehicle')->unsigned();
  		    $table->integer('id_rider_zone')->unsigned();
  		    $table->boolean('active')->default('0');
  		    $table->integer('max_travel')->default('0');

  		    $table->primary('id_rider');

  		    $table->index('id_employee','employee_rider_id');
  		    $table->index('id_vehicle','vehicle_rider_id');
  		    $table->index('id_rider_zone','zone_rider_id');

  		    $table->foreign('id_employee')
  		        ->references('id_zone')->on('s')
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
  		    Schema::drop('riders');

      }
}
