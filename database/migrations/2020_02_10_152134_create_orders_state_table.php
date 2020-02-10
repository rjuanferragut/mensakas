<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders_state', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->increments('id_orders_state')->unsigned();
  		    $table->boolean('invoice')->unsigned()->default('0');
  		    $table->boolean('send_email')->unsigned()->default('0');
  		    $table->boolean('active')->unsigned()->default('0');
  		    $table->boolean('paid')->unsigned()->default('0');

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
        Schema::dropIfExists('orders_state');
    }
}
