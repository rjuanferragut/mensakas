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
      		    $table->time('added_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

      		    $table->index('id_order','fk_orders_rider_orders');
      		    $table->index('id_rider','fk_orders_rider_rider');
      		    $table->index('id_order_invoice','fk_orders_rider_invoices');

      		    $table->foreign('id_order_invoice')
      		        ->references('id_rider')->on('s')
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
