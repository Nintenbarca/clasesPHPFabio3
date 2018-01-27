<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 250);
            $table->string('slug', 250);
            $table->string('resumen', 250);
            $table->text('contenido');
            $table->integer('categoria')->unsigned();
            $table->string('palabras', 250);
            $table->boolean('privado');
            $table->timestampTz('fecha');
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
        Schema::dropIfExists('posts');
    }
}
