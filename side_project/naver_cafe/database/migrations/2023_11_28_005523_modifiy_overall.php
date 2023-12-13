<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertises', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
        });
        Schema::table('cafes', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
            $table->integer('user_number')->unsigned()->change();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
        });
        Schema::table('emoji', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
            $table->integer('user_number')->unsigned()->change();
        });
        Schema::table('emoji_ones', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
            $table->integer('emoji_number')->unsigned()->change();
        });
        Schema::table('files', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
        });
        Schema::table('my_cafes', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
            $table->integer('user_number')->unsigned()->change();
            $table->integer('file_number')->unsigned()->nullable()->change();
        });
        Schema::table('nc_boards', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
            $table->integer('user_number')->unsigned()->change();
            $table->integer('emoji_number')->unsigned()->change();
            $table->integer('file_number')->unsigned()->nullable()->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertises', function (Blueprint $table) {
            $table->id()->change();
        });
        Schema::table('cafes', function (Blueprint $table) {
            $table->id()->change();
            $table->bigInteger('user_number')->unsigned()->change();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->id()->change();
        });
        Schema::table('emoji', function (Blueprint $table) {
            $table->id()->change();
            $table->bigInteger('user_number')->change();
        });
        Schema::table('emoji_ones', function (Blueprint $table) {
            $table->id()->change();
            $table->bigInteger('emoji_number')->unsigned()->change();
        });
        Schema::table('files', function (Blueprint $table) {
            $table->id()->change();
        });
        Schema::table('my_cafes', function (Blueprint $table) {
            $table->id()->change();
            $table->bigInteger('user_number')->unsigned()->change();
            $table->bigInteger('file_number')->unsigned()->nullable()->change();
        });
        Schema::table('nc_boards', function (Blueprint $table) {
            $table->id()->change();
            $table->bigInteger('user_number')->unsigned()->change();
            $table->bigInteger('emoji_number')->unsigned()->change();
            $table->bigInteger('file_number')->unsigned()->nullable()->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->id()->change();
        });
    }
};
