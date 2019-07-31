<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compounds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('compound_name');
            $table->string('structure');
            $table->string('chemist');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE compounds ADD FULLTEXT index content (`structure`) with parser ngram');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compounds');
    }
}
