<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('customers', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

          $table->increments('id_customer')->unsigned();
  		    $table->integer('id_lang')->unsigned();
          $table->integer('id_address')->unsigned();
  		    $table->boolean('is_guest')->default('0');
  		    $table->string('secure_key', 32)->default('0');
  		    $table->string('first_name', 255)->default('0');
  		    $table->string('last_name', 255)->default('0');
  		    $table->string('email', 150)->default('0');
  		    $table->integer('phone')->default('0');
  		    $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
  		    $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
  		    $table->string('reset_password_token', 40)->default('0');
  		    $table->timestamp('reset_password_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

  		    $table->unique('phone','phone');
  		    $table->unique('email','email');

          $table->foreign('id_lang')
              ->references('id_language')->on('language')
              ->onDelete('cascade')
              ->onUpdate('cascade');

         $table->foreign('id_address')
             ->references('id_address')->on('address')
             ->onDelete('cascade')
             ->onUpdate('cascade');

  		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
