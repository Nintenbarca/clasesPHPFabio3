<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasTable('categorias') && Schema::hasColumn('categorias', 'id') && Schema::hasColumn('posts', 'categoria')) {
                $table->index('categoria');
                $table->foreign('categoria')->references('id')->on('categorias')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_categoria_index');
            $table->dropForeign('posts_categoria_foreign');
        });
    }
}
