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
      		    $table->integer('id_cart')->unsigned();
      		    $table->text('message');
      		    $table->time('added_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

      		    $table->index('id_order','fk_messages_orders');
      		    $table->index('id_supplier','fk_messages_suppliers');
      		    $table->index('id_rider','fk_messages_riders');

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
