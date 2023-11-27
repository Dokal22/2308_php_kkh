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
            $table->bigInteger('emoji_number')->after('content');
            $table->renameColumn('file', 'file_number');
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
            $table->dropColumn('emoji_number');
            $table->renameColumn('file_number', 'file');
        });
    }
};
