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
      		    $table->integer('id_supplier')->unsigned()->default('0');
      		    $table->integer('id_category_default')->unsigned()->default('0');
      		    $table->integer('id_tax_rules')->unsigned()->default('0');
      		    $table->boolean('active')->default('0');
      		    $table->boolean('show_price')->default('0');
      		    $table->integer('minimal_quantity')->default('1');
      		    $table->decimal('price', 20, 2)->default('0.00');
      		    $table->decimal('additional_shipping_cost', 20, 2)->default('0.00');
      		    $table->boolean('gluten_contains')->default('0');
      		    $table->time('added_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
      		    $table->time('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

      		    $table->index('id_category_default','categories_fk');
      		    $table->index('id_supplier','suppliers_fk');
      		    $table->index('id_tax_rules','taxes_fk');

      		    $table->foreign('id_category_default')
      		        ->references('id_category_default')->on('products_categories')
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
