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
        Schema::create('my_cafes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_number')->unsigned();
            $table->integer('visit')->unsigned()->default('1');
            $table->char('level',2)->default('0');
            $table->bigInteger('file_number')->unsigned()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_cafes');
    }
};
