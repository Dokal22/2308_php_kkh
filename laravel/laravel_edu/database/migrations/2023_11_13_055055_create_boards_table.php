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

    // 자동으로 '보드명s'로 제작
    // 기본값: big_int, ph, auto_incre~, 이름: id
    // 기본 not null, ->nullable() : 널허용
    // ->index() : 인덱스 추가
    {
        // php artisan make:migration
        // php artisan migrate 실행
        // php artisan migrate:reset
        // php artisan migrate:rollback

        Schema::create('boards', function (Blueprint $table) {
            // 글버노, 제목, 내용, 작성일, 수정일, 삭제일
            $table->id(); //  big_int, pk, auto_incre~, 이름: id
            $table->string('title', 50); // varchar(50), not null
            $table->string('content', 1000); // varchar(1000), not null
            $table->timestamps(); // created_at, updated_at 로 자동 생성, null 허용
            // $table->timestamp('created_at')->default('CURRENT_TIMESTAMP'); // 낫널하려고 만듬: 안됨
            // $table->timestamp('updated_at')->default('CURRENT_TIMESTAMP');
            $table->softDeletes(); // deleted_at 으로 자동 생성? 
            // 기본 널허용, null인지 아닌지 판별 탑재
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
