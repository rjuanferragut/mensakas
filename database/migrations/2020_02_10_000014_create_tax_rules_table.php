<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxRulesTable extends Migration
{
  public function up() {
    Schema::create('tax_rules', function(Blueprint $table) {
        $table->engine = 'InnoDB';

        $table->increments('id_tax_rule')->unsigned();
        $table->decimal('rate', 10, 3);
        $table->boolean('active')->default('0');
        $table->string('name', 32);

        $table->timestamps();
      });
  }

  public function down() {
    Schema::drop('tax_rules');
  }
}
