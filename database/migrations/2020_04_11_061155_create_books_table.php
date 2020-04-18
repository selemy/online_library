<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books_authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('books_genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('year');
            $table->text('description');
            $table->string('cover_path');
            $table->string('file_path');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        // Описание внешних ключей.
        Schema::table('books', function (Blueprint $table) {
            $table->foreign('genre_id')
                ->references('id')
                ->on('books_genres')
                ->onDelete('restrict');

        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('author_id')
                ->references('id')
                ->on('books_authors')
                ->onDelete('restrict');

        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });

    }

    public function down()
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('books_genres');
        Schema::dropIfExists('books_authors');
    }
}
