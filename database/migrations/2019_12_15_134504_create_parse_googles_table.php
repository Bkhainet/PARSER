<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParseGooglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parse_googles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_Google')->nullable();
            $table->string('domaine_name', 255)->nullable();
            $table->string('key_word', 255)->nullable();
            $table->string('word', 255)->nullable();
            $table->timestamp('Time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parse_googles');
    }
}
