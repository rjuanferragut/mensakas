<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('profiles', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->increments('id_profile')->unsigned();
          $table->char('name', 255);
  		    $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
  		    $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

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
      Schema::dropIfExists('profiles');
    }
}
