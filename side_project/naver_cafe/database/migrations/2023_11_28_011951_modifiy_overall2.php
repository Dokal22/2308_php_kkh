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
        Schema::table('advertises', function (Blueprint $table) {
            $table->string('describe',100)->change();
        });
        Schema::table('nc_boards', function (Blueprint $table) {
            $table->integer('emoji_number')->unsigned()->nullable()->change();
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
            $table->string('describe',20)->change();
        });
        Schema::table('nc_boards', function (Blueprint $table) {
            $table->integer('emoji_number')->unsigned()->change();
        });
    }
};
