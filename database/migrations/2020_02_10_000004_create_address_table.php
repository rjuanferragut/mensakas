<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_address')->unsigned();
		    $table->integer('id_country')->unsigned();
		    $table->integer('id_state')->unsigned();
		    $table->integer('id_customer')->unsigned();
		    $table->integer('id_supplier')->unsigned();
		    $table->integer('id_rider')->unsigned();
		    $table->string('address', 128)->default('');
		    $table->integer('zipcode')->default('0');
		    $table->boolean('active')->default('0');
		    $table->boolean('deleted')->default('0');
		    $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('address');
    }
}
