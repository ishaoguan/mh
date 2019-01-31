<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function my()
    {

        return view('my',[
            'type'=>3
        ]);
    }



    public function recharge()
    {


        return view('recharge',[
            'type'=>3,
        ]);
    }


    public function password()
    {

        return view('password',[
            'type'=>3,
        ]);

    }


    public function changePassword(Request $request)
    {
        $this->validate($request,[
            'password'=>'required|min:5|max:15',
            'password1'=>'required|min:5|max:15',
        ]);

        if($this->checkLogin() ===false){
            return $this->error('请先登陆',202);
        }
        if($user = User::find(session('user_id')))
        {
            if(decrypt($user->password) != $request->password){
                return $this->error('原始密码不正确');
            }

            $user->update([
                'password'=>encrypt($request->password1)
            ]);

            return $this->success('修改密码成功',['url'=>'/my']);

        }

        return $this->error('网络错误');


    }

}
