<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    public function up() {
      Schema::create('invoices', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_invoice')->unsigned();
      		    $table->integer('id_order')->unsigned();
      		    $table->integer('id_customer')->unsigned();
      		    $table->integer('number')->unsigned();
      		    $table->timestamp('delivery_time')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
      		    $table->decimal('total_paid', 20, 2)->default('0.00');
      		    $table->integer('tax_rule')->unsigned();

      		    $table->unique('number','number');

              $table->index('id_customer','id_customer');
      		    $table->index('tax_rule','tax_rule');
      		    $table->index('id_order','id_order');

      		    $table->foreign('id_customer')
      		        ->references('id_customer')->on('customers')
      		        ->onDelete('cascade')
      		        ->onUpdate('cascade');

              $table->foreign('tax_rule')
          		      ->references('id_tax_rule')->on('tax_rules')
          		      ->onDelete('cascade')
          		      ->onUpdate('cascade');

              $table->foreign('id_order')
            		     ->references('id_order')->on('orders')
            		     ->onDelete('cascade')
            		     ->onUpdate('cascade');
      		    $table->timestamps();

      		});
    }

    public function down() {
        Schema::dropIfExists('invoices');
    }
}
