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

      		    $table->increments('id_product_categories')->unsigned();
      		    $table->integer('id_parent')->unsigned()->default('0');
      		    $table->boolean('active')->default('0');
      		    $table->integer('position')->unsigned()->default('0');
      		    $table->boolean('is_root_category')->default('0');
      		    $table->time('added_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
      		    $table->time('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

      		    $table->index('id_parent','parent_category_fk');

      		    $table->foreign('id_parent')
      		        ->references('id_product_categories')->on('s')
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
        Schema::dropIfExists('products_categories');
    }
}
