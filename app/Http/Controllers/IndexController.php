<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cartoon;
use App\Models\Cartoon_list;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $banners = Banner::select('image','cartoon_id')->get()->toArray();

//        $cartoons_one = Cartoon::where('recommend',2)->where('cate_id',1)->get()->toArray();
//        $cartoons_two = Cartoon::where('recommend',2)->where('cate_id',2)->get()->toArray();
//        $cartoons_three = Cartoon::where('recommend',2)->where('cate_id',3)->get()->toArray();
        $cartoons_f = Cartoon::where('recommend',3)->first();
        $cartoons = Cartoon::get();

        return view('index',[
            'banners'=>$banners,
            'cartoons'=>$cartoons,
            'cartoons_f'=>$cartoons_f,
//            'cartoons_one'=>$cartoons_one,
//            'cartoons_two'=>$cartoons_two,
//            'cartoons_three'=>$cartoons_three,
        ]);

    }



    public function detail($id)
    {
        if(!$cartoon = Cartoon::find($id)){
            return 'error ! 未找到此页面';
        }

        $likes = Cartoon::where('cate_id',$cartoon->cate_id)->orderBy('sort','desc')->limit(6)->get();

        return view('detail',[
            'cartoon'=>$cartoon,
            'likes'=>$likes
        ]);

    }


    public function cartoon($id,$list_id)
    {
        $cartoons =  Cartoon_list::where('cartoon_id',$id)->where('page',$list_id)->first();
        return view('cartoon',[
            'cartoons'=>$cartoons,
        ]);
    }


}
