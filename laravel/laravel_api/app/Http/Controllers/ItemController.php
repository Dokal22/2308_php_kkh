<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    // 전체 게시글 조회
    public function index()
    {
        $responseData = [
            "code" => "0",
            "msg" => "",
            "data" => []
        ];

        $result = Item::orderBy('created_at', 'desc')->get();

        if ($result->count() < 1) {
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            $responseData['data'] = $result;
        }

        return $responseData;
    }

    // 게시글 작성
    public function store(Request $request)
    {
        $responseData = [
            "code" => "0",
            "msg" => "",
            "data" => []
        ];

        $result = Item::create($request->data);
        // $request->data->content; 
        // <php 원래 php만으로는 일케 햇다
        // $url = 'https://jsonplaceholder.typicode.com/posts/1';
        // $json = file_get_contents($url);
        // $jo = json_decode($json);
        // echo $jo->title;
        $responseData['data'] = $result;

        return $responseData;
    }

    // 게시글 수정
    public function update(Request $request, $id)
    {
        $responseData = [
            "code" => "0",
            "msg" => "",
            "data" => []
        ];

        $result = Item::find($id);
        // $request->data->content; // 원래는 fileopen하고 읽어서 배열로 바꿔서 썼다?(json)

        if (!$result) {
            $responseData["code"] = "E01";
            $responseData["msg"] = "No Data.";
        } else {
            $result->completed = $request->data['completed'];
            $result->completed_at = $request->data['completed'] === '1' ? Carbon::now() : null;
            $result->save();
            // $result->update($request)->only("completed"); 이거도 되려나
            
            $responseData['data'] = $result;
        }

        return $responseData;
    }

    // 게시글 삭제
    public function delete($id){
        $responseData = [
            "code" => "0",
            "msg" => ""
        ];

        $result = Item::find($id);

        if (!$result) {
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            $result->delete();
        }

        return $responseData;
    }
}
