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
        Schema::create('nc_boards', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 20);
            $table->string('title', 50);
            $table->string('content',1000);
            $table->char('file',10)->nullable();
            $table->char('view',10)->default('0');
            $table->char('like',10)->default('0');
            $table->char('comment_cnt',10)->default('0');
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
        Schema::dropIfExists('nc_boards');
    }
};
