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
            $table->increments('id_Google');
            $table->string('domaine_name')->nullable();
            $table->string('key_word')->nullable();
            $table->string('word')->nullable();
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
