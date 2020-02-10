<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_address')->unsigned();
		    $table->integer('id_country')->unsigned();
		    $table->integer('id_state')->unsigned();
		    $table->integer('id_customer')->unsigned()->default(null);
		    $table->integer('id_supplier')->unsigned()->default(null);
		    $table->integer('id_rider')->unsigned()->default(null);
		    $table->string('address', 128)->default('');
		    $table->integer('zipcode')->default('0');
		    $table->boolean('active')->default('0');
		    $table->boolean('deleted')->default('0');
		    $table->time('added_at')->default('0000-00-00 00:00:00');
		    $table->time('updated_at')->default('0000-00-00 00:00:00');

		    $table->index('id_customer','fk_address_customers');
		    $table->index('id_supplier','fk_address_suppliers');
		    $table->index('id_rider','fk_address_riders');
		    $table->index('id_country','fk_address_country');
		    $table->index('id_state','fk_address_state');

		    $table->foreign('id_country')
		        ->references('id_supplier')->on('s')
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
        Schema::dropIfExists('address');
    }
}
