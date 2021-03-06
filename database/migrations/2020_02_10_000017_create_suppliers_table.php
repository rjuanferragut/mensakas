<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
  public function up()  {
 		Schema::create('suppliers', function(Blueprint $table) {
 		    $table->engine = 'InnoDB';

 		    $table->increments('id_supplier')->unsigned();
 		    $table->string('name', 64);
 		    $table->integer('id_category_supplier')->unsigned()->default('0');
 		    $table->string('email', 75);
 		    $table->string('address', 155);
 		    $table->integer('zipcode')->default('0');
 		    $table->string('city', 155)->default('0');
 		    $table->integer('phone');
        $table->boolean('active')->default('0');
 		    $table->unique('email','email');
 		    $table->index('id_category_supplier','supplier_category');

 		    $table->foreign('id_category_supplier')
 		        ->references('id_supplier_category')->on('suppliers_categories')
 		        ->onDelete('cascade')
 		        ->onUpdate('cascade');

 		    $table->timestamps();
 		   });
   }

     public function down() {
 		Schema::drop('suppliers');

     }
}
