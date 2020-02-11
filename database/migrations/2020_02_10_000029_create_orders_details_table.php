<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders_details', function(Blueprint $table) {
    		    $table->engine = 'InnoDB';

    		    $table->increments('id_order_detail')->unsigned();
    		    $table->integer('id_order')->unsigned();
    		    $table->integer('id_order_invoice')->unsigned();
    		    $table->integer('id_supplier')->unsigned();
    		    $table->integer('id_product')->unsigned();
    		    $table->string('product_name', 255)->default(null);
    		    $table->decimal('product_price', 20, 2)->default('0.00');
    		    $table->integer('product_quantity')->default('0');
    		    $table->integer('id_tax_rule')->unsigned()->default('0');
    		    $table->decimal('total_price', 20, 2)->unsigned()->default('0.00');

    		    $table->index('id_order','id_order');
    		    $table->index('id_order_invoice','id_order_invoice');
    		    $table->index('id_supplier','fk_orders_details_suppliers');
    		    $table->index('id_product','fk_orders_details_products');
    		    $table->index('id_tax_rule','fk_orders_details_tax_rules');

    		    $table->foreign('id_order')
    		        ->references('id_order')->on('orders')
    		        ->onDelete('cascade')
    		        ->onUpdate('cascade');

            $table->foreign('id_order_invoice')
                ->references('id_invoice')->on('invoices')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_supplier')
                ->references('id_supplier')->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_product')
                ->references('id_product')->on('products');

            $table->foreign('id_tax_rule')
                ->references('id_tax_rule')->on('tax_rules')
                ->onDelete('cascade')
                ->onUpdate('cascade');

    		    $table->timestamps();
    		});

        Schema::table('address', function (Blueprint $table) {
    		    $table->foreign('id_customer')
    		        ->references('id_customer')->on('customers')
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

            $table->foreign('id_country')
                ->references('id_country')->on('country')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_state')
                ->references('id_orders_state')->on('orders_state')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_details');
    }
}
