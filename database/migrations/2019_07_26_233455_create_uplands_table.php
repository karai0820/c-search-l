<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUplandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uplands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compound_id')->references('id')->on('compounds');
            $table->integer('method_id')->references('id')->on('methods');
            $table->string('mode_of_action');
            $table->integer('ECHUT');
            $table->integer('DIGAD');
            $table->integer('ZEAMD');
            $table->integer('TRZAX');
            $table->string('symptom');
            $table->string('comment');
            $table->string('author');
            $table->string('updater');
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
        Schema::dropIfExists('uplandHerbicides');
    }
}
