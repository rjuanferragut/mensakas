<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products_categories', function(Blueprint $table) {
      		    $table->engine = 'InnoDB';

      		    $table->increments('id_product_category')->unsigned();
      		    $table->integer('id_parent')->unsigned()->nullable();
      		    $table->boolean('active')->default('0');
      		    $table->integer('position')->unsigned()->default('0');
      		    $table->boolean('is_root_category')->default('0');
      		    $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
      		    $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

      		    $table->index('id_parent','id_parent');
      		    $table->foreign('id_parent')->references('id_product_category')->on('products_categories');

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
        Schema::dropIfExists('products_categories');
    }
}
