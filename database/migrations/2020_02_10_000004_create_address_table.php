<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
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
		    $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP'));

		    // $table->index('id_customer','fk_address_customers');
		    // $table->index('id_supplier','fk_address_suppliers');
		    // $table->index('id_rider','fk_address_riders');
		    // $table->index('id_country','fk_address_country');
		    // $table->index('id_state','fk_address_state');
        //
		    // $table->foreign('id_customer')
		    //     ->references('id_customer')->on('customers')
		    //     ->onDelete('cascade')
		    //     ->onUpdate('cascade');
        //
        // $table->foreign('id_supplier')
        //     ->references('id_supplier')->on('suppliers')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
        //
        // $table->foreign('id_rider')
        //     ->references('id_rider')->on('riders')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
        //
        // $table->foreign('id_country')
        //     ->references('id_country')->on('country')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
        //
        // $table->foreign('id_state')
        //     ->references('id_state')->on('states')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
        //
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
