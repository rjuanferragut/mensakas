<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('language', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->increments('id_language')->unsigned();
  		    $table->string('name', 50)->default('0');
  		    $table->boolean('active')->default('0');
  		    $table->string('iso_code', 2)->default('0');
  		    $table->boolean('default')->default('0');

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
        Schema::dropIfExists('language');
    }
}
