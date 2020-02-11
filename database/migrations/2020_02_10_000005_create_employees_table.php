<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('employees', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_employee')->unsigned();
      		    $table->integer('id_profile')->unsigned()->default('0');
      		    $table->string('dni', 10)->default('999999999A');
      		    $table->string('fistname', 255);
      		    $table->string('lastname', 255);
      		    $table->string('email', 150);
      		    $table->integer('phone');
              $table->integer('id_address')->unsigned();
      		    $table->string('passwd', 255);
      		    $table->timestamp('last_passwd_gen')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
      		    $table->boolean('active')->unsigned()->default('0');
      		    $table->timestamp('hire_date')->default(DB::raw('CURRENT_TIMESTAMP'));
      		    $table->timestamp('discharge_date')->default(DB::raw('CURRENT_TIMESTAMP'));
      		    $table->timestamp('last_connection')->default(DB::raw('CURRENT_TIMESTAMP'));
      		    $table->string('reset_password_token', 40)->default(null);

      		    $table->unique('dni','dni');
      		    $table->unique('phone','phone');
      		    $table->unique('email','email');

      		    $table->index('id_profile','id_profile');
              $table->index('id_address','id_address');

      		    $table->foreign('id_profile')
      		        ->references('id_profile')->on('profiles')
      		        ->onDelete('cascade')
      		        ->onUpdate('cascade');

              $table->foreign('id_address')
                  ->references('id_address')->on('address')
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
        Schema::dropIfExists('employees');
    }
}
