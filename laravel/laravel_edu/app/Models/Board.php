<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    // php artisan make:model 보드이름 -mfs 로 마이그레, 팩토, 시더 한번에

    // 테이블 정의 (정의하지 않을 경우에는 클래스 명의 복수형을 암묵적으로 인식)
    protected $table = "boards"; // 변수명 table 고정

    // pk 자동? ( 정의 안하면 id임)
    protected $primaryKey = "id";

    // 대량 할당을 이용한 취약성 대책 (둘 중 하나)
    // // 1. 화이트 리스트 방식: 수정할 수 있는 칼럼을 설정
    // protected $fillable = ['칼럼1','칼럼2'];
    // // 2. 블랙 리스트 방식: 수정할 수 없는 칼럼을 설정
    // protected $guarded = ['칼럼1','칼럼2'];

    // created_at, updated_at를 디폴트값 셋팅
    public $timestamps = true;
}