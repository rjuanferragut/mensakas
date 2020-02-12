<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeVehicleTable extends Migration
{
  public function up()
     {
 		Schema::create('type_vehicle', function(Blueprint $table) {
 		    $table->engine = 'InnoDB';

 		    $table->increments('id_type_vehicle')->unsigned();
 		    $table->string('name', 70)->default('');
 		    $table->string('specs', 70)->default(null);

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
 		Schema::drop('type_vehicle');

     }
}
