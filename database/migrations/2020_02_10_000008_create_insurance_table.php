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
      		    $table->timestamp('created_on')->default(DB::raw('CURRENT_TIMESTAMP'));
      		    $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

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
