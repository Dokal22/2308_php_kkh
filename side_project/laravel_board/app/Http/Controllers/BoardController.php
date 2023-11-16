<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* del 231116 미들웨어로 이관
        // 로그인 체크
        if(!Auth::check()){
            return redirect()->route("user.login.get");
        }
        */

        // 리스트 출력
        $result = Board::orderBy('b_id', 'desc')->get();

        return view("list")->with("data", $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request);
        // var_dump($request->all());
        // 작성 처리
        $arrInputData = $request->only('b_title', 'b_content');
        $result = Board::create($arrInputData);
        // Board : 엘로퀀트라서 작성일, 수정일 자동 넣음
        // only : 배열로 입력

        // 수진님꺼
        // Board::create([
        //     'b_id' => $request->b_id,
        //     'b_title' => $request->b_title,
        //     'b_hits'=> $request->b_hits,
        //     'b_content'=> $request->b_content,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);


        // 보드 업데이트 때는 일케 함.
        // $model = new Board($arrInputData);
        // $model->save(); // <= create랑 호환 안되나봄

        return redirect()->route('board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 데이터 찾기
        $result = Board::find($id); // (엘로퀀트)다?
        // $result = DB::table('boards')->where('b_id',$id)->get(); // <= 동일(쿼리빌더)
        // var_dump($result);

        //조회수 올리기
        $result->b_hits++;
        $result->timestamps = false;

        // attribute: 변경값, origin:가져온값


        // 업데이트 처리
        $result->save();

        return view("detail")->with("result", $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::debug("-----------------삭제시갖----------------");
        try {
            DB::beginTransaction();
            Log::debug("-----------------트랜잭션 함----------------");
            // Board::find($id)->delete();
            Board::destroy($id);
            Log::debug("-----------------부숨----------------");
            DB::commit();
            Log::debug("-----------------저장----------------");
        } catch (Exception $e) {
            DB::rollBack();
            Log::debug("-----------------되돌림----------------");
            return redirect()->route('error')->with("error", $e->getMessage());
        } finally {
            Log::debug("-----------------삭제끗----------------");
        }
        return redirect()->route("board.index");
    }
}
