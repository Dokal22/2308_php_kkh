<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index()
    {
        // ----------
        // 쿼리빌더
        // ----------
        $result = DB::select("select * from boards limit 10");

        $result = DB::select("select * from boards limit :no", ['no' => 1]); // 콜롱 뺌
        $result = DB::select("select * from boards limit ?", [2]); // 물음표 순

        // 카테고리가 4, 7, 8 인 게시글의 수를 출력
        $arr = [4, 7, 8];
        $result = DB::select(
            "select count(id) as cnt 
            from boards 
            where 
            categories_no in(?,?,?)",
            $arr
        );

        // 카테고리별 게시글 갯수를 출력
        $result = DB::select(
            "select count(*) cnt
            from boards
            group by categories_no"
        );

        // 위에 꺼에 카테고리면도 출력
        $result = DB::select(
            "
            select 
                c.name
                ,count(c.name) cnt
            from 
                boards b
              join categories c
                on b.categories_no = c.no
            group by 
                c.name
            "
        );

        // ----------------insert------------------
        $sql =
            '
        INSERT INTO 
            boards(
                title
                ,content
                ,created_at
                ,updated_at
                ,categories_no
            )
        VAlUES( ?,?,?,?,?)
        ';
        $arr = [
            '제목1'
            ,
            '내용1'
            ,
            now()
            ,
            now()
            ,
            '0'
        ]
        ;
        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();

        $result = DB::select('select * from boards order by id desc limit 1');

        // ----------------update------------------
        // DB::beginTransaction();
        // DB::update('update boards set title=?,content=? where id=?', ['업데이트1','업1',$result[0]->id]);
        // DB::commit();

        $result = DB::select('select * from boards order by id desc limit 1');

        // ----------------delete------------------
        // DB::beginTransaction();
        // DB::delete('delete from boards where id = ?', [$result[0]->id]);
        // DB::commit();

        // orm이나 이거나 속도가 다 다르다?

        // -------------
        // 쿼리빌더 체이닝
        // -------------
        $result =
            DB::table('boards')
                ->where('id', '=', 300)
                ->get(); // 얘가 셀렉트

        $result =
            DB::table('boards')
                ->where('id', '=', 300) // and는 그냥 where 붙이고
                ->orWhere('id', '=', 400) // OR 굉장히 느림
                ->orderBy('id', 'desc') // order by
                ->get(); // 얘가 셀렉트

        $result =
            DB::table('categories')
                ->whereIn('no', [1, 2, 3])
                ->get();

        $result =
            DB::table('categories')
                ->whereNotIn('no', [1, 2, 3]) // 얘는 빠름. 항상느린놈들은 없다!
                ->get();

        // first() : limit 1 하고 비슷하게 동작
        $result = DB::table('boards')->orderBy('id', 'desc')->first();

        // count() : 결과의 레코드 수를 반환
        $result = DB::table('boards')->count();

        // max()
        $result = DB::table('boards')->max('categories_no');

        // min()
        $result = DB::table('boards')->min('created_at');

        // 게시글 정보 + 카테고리명 까지 출력 100개 출력
        $result = DB::table('boards')
            ->select('boards.title', 'boards.content', 'categories.name')
            ->join('categories', 'categories.no', '=', 'boards.categories_no')
            ->limit(100)
            ->get();

        // 카테고리별 게시글 갯수를 출력+이름도 in 체인메소드
        $result = DB::table('boards')
            ->select('categories.name', 'categories.no', DB::raw('count(categories.no) as cnt'))
            ->join('categories', 'categories.no', '=', 'boards.categories_no')
            ->groupBy('categories.name', 'categories.no')
            ->get();

        return var_dump($result);
    }
}
