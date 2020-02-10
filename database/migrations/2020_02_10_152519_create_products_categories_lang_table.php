<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoriesLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products_categories_lang', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->increments('id_product_category')->unsigned();
  		    $table->integer('id_product')->unsigned()->default('0');
  		    $table->integer('id_lang')->unsigned();
  		    $table->string('name', 128);
  		    $table->string('description', 255);

  		    $table->index('id_lang','id_lang_product_category_fk');
  		    $table->index('id_product','fk_products_categories_lang_products');

  		    $table->foreign('id_product')
  		        ->references('id_language')->on('e')
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
        Schema::dropIfExists('products_categories_lang');
    }
}
