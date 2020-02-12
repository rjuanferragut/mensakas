<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('messages', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_messages')->unsigned();
      		    $table->integer('id_order')->unsigned()->unique();
      		    $table->integer('id_supplier')->unsigned();
      		    $table->integer('id_rider')->unsigned();
      		    $table->text('message');

      		    $table->index('id_order','id_order');
      		    $table->index('id_supplier','id_supplier');
      		    $table->index('id_rider','id_rider');

      		    $table->foreign('id_order')
      		        ->references('id_order')->on('orders')
      		        ->onDelete('cascade')
      		        ->onUpdate('cascade');

              $table->foreign('id_supplier')
                   ->references('id_supplier')->on('suppliers')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');

              $table->foreign('id_rider')
                ->references('id_rider')->on('riders')
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
        Schema::dropIfExists('messages');
    }
}
