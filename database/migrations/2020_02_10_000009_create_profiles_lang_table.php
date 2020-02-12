<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('profiles_lang', function(Blueprint $table) {
  		    $table->engine = 'InnoDB';

  		    $table->increments('id_profile_lang')->unsigned();
  		    $table->integer('id_profile')->unsigned();
  		    $table->integer('id_lang')->unsigned();
  		    $table->string('name_profile', 50)->default('Translate not found');
  		    $table->string('decription_profile', 255)->default('Translate not found');

          $table->index('id_lang','id_lang');
  		    $table->index('id_profile','id_profile');

  		    $table->foreign('id_lang')
  		        ->references('id_language')->on('language')
  		        ->onDelete('cascade')
  		        ->onUpdate('cascade');

           $table->foreign('id_profile')
              ->references('id_profile')->on('profiles')
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
		    Schema::drop('profiles_lang');
    }
}
