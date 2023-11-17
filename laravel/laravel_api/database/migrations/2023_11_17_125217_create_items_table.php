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
    public function up() // 마이그레이션은 migrate:rollback 또는 migrate:reset
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // 쌤꺼 설계서 보고 하는중
            $table->string('content', 255); // 그냥 스트링이면 기본 255?
            $table->char('completed', 1); // 완료 플래그
            $table->timestamp('completed_at')->nullable();
            $table->timestamps(); // 프레임 워크를 구상할 때 경우의 수를 다 생각했을까 아님 추상적으로 분류해놓고 배치했을까
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
        Schema::dropIfExists('items');
    }
};
