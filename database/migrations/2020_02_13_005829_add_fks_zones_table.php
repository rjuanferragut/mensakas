<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('zones', function (Blueprint $table) {
        $table->foreign('id_state')
            ->references('id_state')->on('state')
            ->onDelete('cascade')
            ->onUpdate('cascade');
      });
    }
}
