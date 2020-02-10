<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_order')->unsigned();
      		    $table->integer('id_rider')->unsigned()->default('0');
      		    $table->integer('id_lang')->unsigned()->default('0');
      		    $table->integer('id_customer')->unsigned()->default('0');
      		    $table->integer('id_cart')->unsigned()->default('0');
      		    $table->integer('id_address_delivery')->unsigned()->default('0');
      		    $table->integer('current_state')->unsigned()->default('0');
      		    $table->string('secure_key', 32)->default('0');
      		    $table->string('payment', 255)->default('0');
      		    $table->string('shipping_number', 64)->default('0');
      		    $table->decimal('total_paid', 20, 2)->default('0.00');
      		    $table->integer('invoice_num')->unsigned()->default('0');
      		    $table->dateTime('invoice_date')->default('0000-00-00 00:00:00');
      		    $table->time('delivery_time')->default('0000-00-00 00:00:00');
      		    $table->time('added_at')->default('0000-00-00 00:00:00');
      		    $table->time('updated_at')->default('0000-00-00 00:00:00');

      		    $table->index('id_rider','rider_order');
      		    $table->index('id_lang','lang_order');
      		    $table->index('id_customer','customer_order');

      		    $table->foreign('id_rider')
      		        ->references('id_rider')->on('riders')
      		        ->onDelete('cascade')
      		        ->onUpdate('cascade');

              $table->foreign('id_customer')
                  ->references('id_customer')->on('customers')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

              $table->foreign('id_lang')
          		     ->references('id_lang')->on('language')
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
        Schema::dropIfExists('orders');
    }
}
