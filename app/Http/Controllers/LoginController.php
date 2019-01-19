<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {


        return view('login',[

        ]);

    }


    public function doLogin(Request $request)
    {


        $this->validate($request,[
            'username'=>'required|min:5|max:12',
            'password'=>'required|min:5|max:15'
        ]);

        if(!$user = User::where('username',$request->username)->first()){
            return $this->error('账号不存在哦');
        }

        if(decrypt($user->password) != $request->password){
            return $this->error('账号或密码错误');
        }


        session()->put(['user_id'=>$user->id]);

        return $this->success('登陆成功',['url'=>'/']);

    }

    public function reg()
    {

        return view('reg',[

        ]);


    }


    public function doReg(Request $request)
    {
        $this->validate($request, [
            'username'=>'required|min:5|max:12',
            'password'=>'required|min:5|max:15',
        ]);


        if ($user = User::where('username', $request->username)->first()) {
            return $this->error('用户名已被注册');      //如果用户名重复返回error
        }

        if ($user =  User::create([
                'username' => $request->username,
                'password' => $request->password,
                ])){

            session()->put(['user_id'=>$user->id]);


            return $this->success('注册成功',['url'=>'/']);

        } else {
            return $this->error();
        }
    }

    public function logOut()
    {

        session()->forget('user_id');

        if(session()->has('user_id')){
            return true;
        }
        return false;

    }


}
