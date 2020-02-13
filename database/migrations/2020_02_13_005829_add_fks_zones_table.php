<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksZonesTable extends Migration
{
    public function up() {
      Schema::table('zones', function (Blueprint $table) {
        $table->foreign('id_state')
            ->references('id_state')->on('state')
            ->onDelete('cascade')
            ->onUpdate('cascade');
      });
    }
}
