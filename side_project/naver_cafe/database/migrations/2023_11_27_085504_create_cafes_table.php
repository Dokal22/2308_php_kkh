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
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_number')->unsigned();
            $table->string('address',200);
            $table->char('level',2)->default('0');
            $table->integer('member')->default('1');
            $table->string('introduct',50)->nullable();
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
        Schema::dropIfExists('cafes');
    }
};
