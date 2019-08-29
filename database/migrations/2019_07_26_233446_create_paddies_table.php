<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaddiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
        Schema::create('paddies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compound_id')->references('id')->on('compounds');
            $table->integer('method_id')->references('id')->on('methods');
            $table->string('mode_of_action');
            $table->integer('ECHCG');
            $table->integer('ORYSP_1');
            $table->integer('ORYSP_3');
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
        Schema::dropIfExists('paddies');
    }
}
