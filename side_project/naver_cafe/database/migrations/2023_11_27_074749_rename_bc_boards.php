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
        Schema::table('nc_boards', function(Blueprint $table) {
            $table->renameColumn('user_name', 'user_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nc_boards', function(Blueprint $table) {
            $table->renameColumn('user_number', 'user_name');
        });
    }
};
