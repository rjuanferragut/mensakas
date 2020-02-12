<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_product')->unsigned();
      		    $table->integer('id_supplier')->unsigned();
      		    $table->integer('id_category_default')->unsigned();
      		    $table->integer('id_tax_rules')->unsigned();
      		    $table->boolean('active')->default('0');
      		    $table->boolean('show_price')->default('0');
      		    $table->integer('minimal_quantity')->default('1');
      		    $table->decimal('price', 20, 2)->default('0.00');
      		    $table->decimal('additional_shipping_cost', 20, 2)->default('0.00');
      		    $table->boolean('gluten_contains')->default('0');

      		    $table->index('id_category_default','id_category_default');
      		    $table->index('id_supplier','id_supplier');
      		    $table->index('id_tax_rules','id_tax_rules');

      		    $table->foreign('id_category_default')
      		        ->references('id_product_category')->on('products_categories')
      		        ->onDelete('cascade')
      		        ->onUpdate('cascade');

              $table->foreign('id_supplier')
          		      ->references('id_supplier')->on('suppliers')
          		      ->onDelete('cascade')
          		      ->onUpdate('cascade');

              $table->foreign('id_tax_rules')
      		        ->references('id_tax_rule')->on('tax_rules')
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
        Schema::dropIfExists('products');
    }
}
