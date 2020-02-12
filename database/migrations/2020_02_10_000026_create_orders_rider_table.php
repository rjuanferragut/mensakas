<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersRiderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders_rider', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_order_rider')->unsigned();
      		    $table->integer('id_order')->unsigned();
      		    $table->integer('id_rider')->unsigned();
      		    $table->integer('id_order_invoice')->unsigned();

      		    $table->index('id_order','id_order');
      		    $table->index('id_rider','id_rider');
      		    $table->index('id_order_invoice','id_order_invoice');

      		    $table->foreign('id_order')
      		        ->references('id_order')->on('orders')
      		        ->onDelete('cascade')
      		        ->onUpdate('cascade');

              $table->foreign('id_rider')
                  ->references('id_rider')->on('riders')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

              $table->foreign('id_order_invoice')
                  ->references('id_invoice')->on('invoices')
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
        Schema::dropIfExists('orders_rider');
    }
}
