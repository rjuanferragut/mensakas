<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    public function up() {
      Schema::create('profiles', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->increments('id_profile')->unsigned();
          $table->char('name', 255);

  		    $table->timestamps();
  		});
    }

    public function down() {
      Schema::dropIfExists('profiles');
    }
}
