<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('insurance', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_insurance')->unsigned();
      		    $table->string('company', 75)->default('');
      		    $table->integer('number_policy')->default('0');
      		    $table->integer('company_phone')->default('0');
      		    $table->integer('id_employee')->unsigned();
      		    $table->date('expiration_date');

      		    $table->index('id_employee','id_employee_insurance');

      		    $table->foreign('id_employee')
      		        ->references('id_employee')->on('employees')
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
        Schema::dropIfExists('insurance');
    }
}
