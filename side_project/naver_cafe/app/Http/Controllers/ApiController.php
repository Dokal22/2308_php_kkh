<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NcBoard;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select("
            SELECT 
                b.id
                ,u.user_name
                ,b.title
                ,b.view
                ,b.like
                ,b.comment_cnt
                ,b.created_at
            FROM
                nc_boards b
              JOIN users u
                ON b.user_number = u.id
            WHERE
                b.deleted_at IS NULL
            ORDER BY 
                b.created_at DESC
            LIMIT 15 OFFSET 35
        ");
        // foreach($result as $item) {
        //     $item->img = asset($item->img);
        //     // $item->img = 'data:image/*;base64, '.base64_encode(file_get_contents(public_path($item->img)));
        // }

        return $result;
    }

    public function index_total($board_type = null)
    {
        // Log::debug("***************".$board_type."**************");
        $result = NcBoard::whereNull("deleted_at")
                    ->when($board_type !== '0', function ($query, $board_type) {
                        return $query->where("board_type", $board_type);
                    })
                    ->count();
        // Log::debug("***************".$result."**************");
        // foreach($result as $item) {
        //     $item->img = asset($item->img);
        //     // $item->img = 'data:image/*;base64, '.base64_encode(file_get_contents(public_path($item->img)));
        // }

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
