<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Post;
use App\MyPage;
use App\User;

class UserRegisterController extends Controller
{
    public function index()
    {
        return view('userregist');
    }

    public function store(Request $request)
    {
        //dd($request);

        $params = $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|max:191',
            'conf_email'=>'required|max:191',
            'password'=>'required|max:191',
            'conf_password'=>'required|max:191',
            'role'=>'required|max:4',
            'skill'=>'required|max:191'
        ]);

        /* email or password が一致していない場合は新規登録画面に戻る */
        if($params['email'] != $params['conf_email']){
            return redirect()->route('userregist');
        }
        if($params['password'] != $params['conf_password']){
            return redirect()->route('userregist');
        }

        /* 新規登録時はまず常に USER:2 とする(運営:1は別途設定) */
        $default =["authority" => 2];
        $params = $params + $default;

        //dd($params);

        User::create($params);

        return redirect()->route('login');
    }
}
