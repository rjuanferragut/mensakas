<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksAddressTable extends Migration
{
    public function up()
    {
      Schema::table('address', function (Blueprint $table) {
          $table->foreign('id_customer')
              ->references('id_customer')->on('customers')
              ->onDelete('cascade')
              ->onUpdate('cascade');

          $table->foreign('id_supplier')
              ->references('id_supplier')->on('suppliers')
              ->onDelete('cascade')
              ->onUpdate('cascade');

          $table->foreign('id_rider')
              ->references('id_rider')->on('riders')
              ->onDelete('cascade')
              ->onUpdate('cascade');

          $table->foreign('id_country')
              ->references('id_country')->on('country')
              ->onDelete('cascade')
              ->onUpdate('cascade');

          $table->foreign('id_state')
              ->references('id_state')->on('state')
              ->onDelete('cascade')
              ->onUpdate('cascade');
      });
    }
}
