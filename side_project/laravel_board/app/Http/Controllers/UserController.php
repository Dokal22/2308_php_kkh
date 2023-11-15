<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function loginget()
    {
        if(Auth::check()){
            return redirect()->route("board.index");
        }
        return view("login");
    }

    public function loginpost(Request $request)
    {
        // $result=User::find(1); // 이게 ORM이드아
        // var_dump($result);

        // 유효성 검사
        $validator = Validator::make(
            $request->only('email', 'password')
            ,
            [
                'email' => 'required|email|max:50',
                'password' => 'required'
            ]
        );

        // 유효성에 안맞으면
        if ($validator->fails()) { //실패시 true
            return view('login')->withErrors($validator->errors());
        }

        // 유저 정보 습득
        $result = User::where('email', $request->email)->first();
        if (!$result || !(Hash::check($request->password, $result->password))) {
            // Hash로 체크해서 암호화하고 비교
            $errorMsg = '아이디와 비밀번호를 확인해주세요';
            return view('login')->withErrors($errorMsg);
        }

        // 유저 인증작업
        Auth::login($result);
        if (Auth::check()) {
            session($result->only('id'));
        } else {
            $errorMsg = "인증에러";
            return view('login')->withErrors($errorMsg);
        }

        return redirect()->route('board.index');
    }

    public function logoutget()
    {
        Session::flush(); // 세션조져
        Auth::logout(); // 권한 플래그 끔?
        return redirect()->route('user.login.get');
    }

    public function registrationget()
    {
        return view('registration');
    }

    public function registrationpost(Request $request)
    {
        // 유효성 검사
        $validator = Validator::make(
            $request->only('email', 'password', 'passwordchk', 'name')
            ,
            [
                'email' => 'required|email|max:50', // 라라벨식 정규식, 순서상관X
                'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50',
                'password' => 'required|same:passwordchk'
            ]
        );
        // var_dump($validator->errors()); //  : 에레메세지
        // 오브젝트 {
        //     $메세지=[
        //         이메일 => [
        //             0 => 에러메세지
        //         ]
        //           ,
        //         이름 => [
        //             0 => 에러메세지
        //         ]
        //         ,
        //         비번 => [
        //             0 => 에러메세지
        //         ]
        //     ]
        //     $형태 = :메세지
        // }

        // 유효성에 안맞으면
        if ($validator->fails()) { //실패시 true
            return view('registration')->withErrors($validator->errors());
        }

        // 저장할 데이터 가져오기
        $data = $request->only(['email', 'password', 'name', 'passwordchk']);
        // only(배열)로 리퀘스트 잔여물 치우고 새 배열 생성

        // 비번 암호화
        $data['password'] = Hash::make($data['password']);

        // 데이터 저장
        $result = User::create($data);
        // var_dump($result);

        return redirect()->route('user.login.get');
    }
}
