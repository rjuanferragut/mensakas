<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleTable extends Migration
{
  public function up()
   {
   Schema::create('vehicles', function(Blueprint $table) {
       $table->engine = 'InnoDB';

       $table->increments('id_vehicle')->unsigned();
       $table->integer('type_vehicle')->unsigned()->default('0');
       $table->string('brand_vehicle', 50)->default('Insert brand vehicle');
       $table->string('model_vehicle', 75)->default('Insert model vehicle');
       $table->string('license_plate', 10)->default('AA0000ZZ');
       $table->string('vin', 17)->default('AA0000ZZ');
       $table->integer('policy_number')->default(null);
       $table->integer('id_insurance')->unsigned()->default(null);
       $table->integer('id_employee')->unsigned();
       $table->time('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
       $table->time('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

       $table->index('id_employee','employee_vehicle_id');
       $table->index('id_insurance','insurance_id');
       $table->index('type_vehicle','type_vehicle_id');

       $table->foreign('id_employee')
           ->references('id_type_vehicle')->on('type_vehicle')
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
   Schema::drop('vehicles');

   }
}
