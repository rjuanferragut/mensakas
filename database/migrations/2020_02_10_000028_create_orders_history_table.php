<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders_history', function(Blueprint $table) {
    		    $table->engine = 'InnoDB';

    		    $table->increments('id_order_history')->unsigned();
    		    $table->integer('id_order')->unsigned()->default('0');
    		    $table->integer('id_employee')->unsigned()->default('0');
    		    $table->integer('id_order_state')->unsigned()->default('0');
    		    $table->time('added_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
    		    $table->time('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

    		    $table->index('id_order','order_history_fk');
    		    $table->index('id_employee','employee_order_history_fk');
    		    $table->index('id_order_state','fk_orders_history_orders_state');

    		    $table->foreign('id_order')
    		        ->references('id_order')->on('orders')
    		        ->onDelete('cascade')
    		        ->onUpdate('cascade');

            $table->foreign('id_employee')
              ->references('id_employee')->on('employees')
              ->onDelete('cascade')
              ->onUpdate('cascade');

            $table->foreign('id_order_state')
      	      ->references('id_order_state')->on('orders_state')
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
        Schema::dropIfExists('orders_history');
    }
}
