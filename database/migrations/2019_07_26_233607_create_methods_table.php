<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('methods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compound_id')->references('id')->on('compounds');
            $table->string('test_area');
            $table->string('test_title');
            $table->string('test_day');
            $table->string('test_scale');
            $table->string('concentration');
            $table->string('conc_unit');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('methods');
    }
}
