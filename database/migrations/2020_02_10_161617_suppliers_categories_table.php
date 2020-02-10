<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuppliersCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('suppliers_categories', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->increments('id_supplier_category')->unsigned();
  		    $table->integer('id_parent')->unsigned();
  		    $table->boolean('active')->default('0');
  		    $table->integer('position')->default('0');
  		    $table->boolean('is_root_category')->default('0');
  		    $table->time('added_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
  		    $table->time('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

  		    $table->index('id_parent','id_parent_category_supplier');

  		    $table->foreign('id_parent')
  		        ->references('id_supplier_category')->on('s')
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
  		Schema::drop('suppliers_categories');

      }
}
