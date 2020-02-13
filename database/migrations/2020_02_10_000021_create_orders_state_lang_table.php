<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersStateLangTable extends Migration
{

    public function up() {
      Schema::create('orders_state_lang', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->integer('id_order_state')->unsigned();
  		    $table->integer('id_lang')->unsigned();
  		    $table->string('name', 64)->default('');
  		    $table->string('state', 64)->default('');
  		    $table->primary('id_order_state');
  		    $table->index('id_lang','id_lang');
  		    $table->foreign('id_lang')
  		        ->references('id_language')->on('language')
  		        ->onDelete('cascade')
  		        ->onUpdate('cascade');
  		    $table->timestamps();
  		});
    }
    public function down() {
        Schema::dropIfExists('orders_state_lang');
    }
}
