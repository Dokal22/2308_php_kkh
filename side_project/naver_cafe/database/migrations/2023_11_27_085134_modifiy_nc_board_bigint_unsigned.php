<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emoji', function(Blueprint $table) {
            $table->bigInteger('user_number')->unsigned()->change();
        });
        Schema::table('nc_boards', function(Blueprint $table) {
            $table->bigInteger('user_number')->unsigned()->change();
            $table->bigInteger('emoji_number')->unsigned()->change();
            $table->bigInteger('file_number')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emoji', function(Blueprint $table) {
            $table->bigInteger('user_number')->change();
        });
        Schema::table('nc_boards', function(Blueprint $table) {
            $table->bigInteger('user_number')->change();
            $table->bigInteger('emoji_number')->change();
            $table->bigInteger('file_number')->change();
        });
    }
};
