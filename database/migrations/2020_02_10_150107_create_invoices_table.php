<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('invoices', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_invoice')->unsigned();
      		    $table->integer('id_order')->unsigned();
      		    $table->integer('id_customer')->unsigned();
      		    $table->integer('number')->unsigned();
      		    $table->time('delivery_time')->default('0000-00-00 00:00:00');
      		    $table->decimal('total_paid', 20, 2)->default('0.00');
      		    $table->integer('tax_rule')->unsigned();

      		    $table->unique('number','number');

      		    $table->index('tax_rule','taxes_invoice');
      		    $table->index('id_order','order_invoice');
      		    $table->index('id_customer','customer_invoice');

      		    $table->foreign('id_customer')
      		        ->references('id_tax_rule')->on('s')
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
        Schema::dropIfExists('invoices');
    }
}
