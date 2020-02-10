<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products_lang', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->increments('id_products_lang')->unsigned();
  		    $table->integer('id_product')->unsigned()->default('0');
  		    $table->integer('id_lang')->unsigned()->default('0');
  		    $table->string('title', 255)->default('0');

  		    $table->index('id_product','id_product_lang_table_fk');
  		    $table->index('id_lang','id_lang_product_lang_table_fk');

  		    $table->foreign('id_lang')
  		        ->references('id_product')->on('s')
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
        Schema::dropIfExists('products_lang');
    }
}
