<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateOrdersTable extends Migration
{
    public function up()  {
      Schema::create('orders', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_order')->unsigned();
      		    $table->integer('id_rider')->unsigned();
      		    $table->integer('id_lang')->unsigned();
      		    $table->integer('id_customer')->unsigned();
      		    $table->integer('id_address_delivery')->unsigned();
      		    $table->integer('current_state')->unsigned();
      		    $table->string('secure_key', 32)->default('0');
      		    $table->string('payment', 255)->default('0');
      		    $table->string('shipping_number', 64)->default('0');
      		    $table->decimal('total_paid', 20, 2)->default('0.00');
      		    $table->integer('invoice_num')->unsigned();
      		    $table->date('invoice_date')->default(Carbon::now());
      		    $table->timestamp('delivery_time')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

      		    $table->index('id_rider','id_rider');
      		    $table->index('id_lang','id_lang');
      		    $table->index('id_customer','id_customer');
              $table->index('id_address_delivery', 'id_address_delivery');
              $table->index('current_state', 'current_state');

      		    $table->foreign('id_rider')
      		        ->references('id_rider')->on('riders')
      		        ->onDelete('cascade')
      		        ->onUpdate('cascade');

              $table->foreign('id_customer')
                  ->references('id_customer')->on('customers')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

              $table->foreign('id_lang')
          		     ->references('id_language')->on('language')
          		     ->onDelete('cascade')
          		     ->onUpdate('cascade');

             $table->foreign('id_address_delivery')
                  ->references('id_address')->on('address')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

             $table->foreign('current_state')
                   ->references('id_orders_state')->on('orders_state')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');

      		    $table->timestamps();
      		});
    }

    public function down() {
        Schema::dropIfExists('orders');
    }
}
