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
        Schema::create('emoji_ones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('emoji_number')->unsigned();
            $table->string('name',20);
            $table->string('address',200);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->default(null);
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
        Schema::dropIfExists('emoji_ones');
    }
};
