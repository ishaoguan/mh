<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Recharge_activity;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户类型

    public function my()
    {


        $user= false;

        if($user_id = $this->checkLogin()){
            $user = User::find($this->checkLogin());
        }



        return view('my',[
            'type'=>config('mh.type.my'),
            'user'=>$user
        ]);
    }



    public function recharge()
    {

        $recharges = Recharge_activity::select([
            'id','money','present_money'
        ])->get();
        return view('recharge',[
            'type'=>config('mh.type.my'),
            'recharges'=>$recharges
        ]);
    }

    /**修改密码页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {


        return view('password',[
            'type'=>config('mh.type.my')
        ]);

    }



    public function message(Request $request)
    {

        if($request->isMethod('post')){
            if($request->_content != '' && $this->checkLogin() != false){
                if($user =User::find(session('user_id'))){
                    //留言大于10
                    if(Message::where('user_id',$user->id)->count() > 10){
                        return $this->error('留言太多了兄弟');
                    }

                    try{
                        Message::create([
                            'user_id'=>$user->id,
                            'username'=>$user->username,
                            'content'=>$request->_content
                        ]);
                    }catch (\Exception $exception){
                        return $this->error($exception->getMessage());
                    }

                    return $this->success();
                }
                return $this->error('用户不存在');


            }
            return $this->error('内容不能为空哦');
        }

        return view('message',[

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
