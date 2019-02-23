<?php

namespace App\Http\Controllers;

use App\Http\Helper\Ip;
use App\Models\Banner;
use App\Models\Browsing_history;
use App\Models\Cartoon;
use App\Models\Cartoon_list;
use App\Models\Cate;
use App\Models\Collect;
use App\Models\Footprint;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use Ip;
    /**首页页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $ip=$this->getIp();

        $nowDayFirst = date('Y-m-d').' 00:00:00'; //当天开始时间
        $nowDayLast  = date('Y-m-d').' 23:59:59'; //当天结束时间

        if(!Browsing_history::where('ip',$ip)->whereBetween('created_at',[$nowDayFirst,$nowDayLast])->first()){
            Browsing_history::create([
                'ip'=>$ip
            ]);
        }


        $banners = Banner::select('image','cartoon_id')->get()->toArray();

//        $cartoons_one = Cartoon::where('recommend',2)->where('cate_id',1)->get()->toArray();
//        $cartoons_two = Cartoon::where('recommend',2)->where('cate_id',2)->get()->toArray();
//        $cartoons_three = Cartoon::where('recommend',2)->where('cate_id',3)->get()->toArray();
        $cartoons_f = Cartoon::where('recommend',3)->first();
        $cartoons = Cartoon::get();

        return view('index',[
            'type'=>config('mh.type.index'),
            'banners'=>$banners,
            'cartoons'=>$cartoons,
            'cartoons_f'=>$cartoons_f,
//            'cartoons_one'=>$cartoons_one,
//            'cartoons_two'=>$cartoons_two,
//            'cartoons_three'=>$cartoons_three,
        ]);

    }


    /**漫画详情页面
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function detail($id)
    {
        if(!$cartoon = Cartoon::find($id)){
            return 'error ! 未找到此页面';
        }

        $likes = Cartoon::where('cate_id',$cartoon->cate_id)->orderBy('sort','desc')->limit(6)->get();

        $collect_type = 'uncollect';

        if($user_id = $this->checkLogin()){
            if($collect =  Collect::where('user_id',$user_id)->where('cartoon_id',$id)->first()){
                $collect_type = 'collect';
            }
        }

        $cartoon->update(['hit'=>$cartoon->hit+1]);

        return view('detail',[
            'cartoon'=>$cartoon,
            'likes'=>$likes,
            'collect_type'=>$collect_type,
        ]);

    }


    /**漫画页面
     * @param $id
     * @param $list_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function cartoon($id,$list_id)
    {
        if(!$cartoon_list =  Cartoon_list::where('cartoon_id',$id)->where('page',$list_id)->first()){
            return 'error ! 未找到此页面';
        }


        $collect_type = 'uncollect';

        if($user_id = $this->checkLogin()){
            if($user =User::find($user_id)){
                //判断该章节是否观看过
                if(!Footprint::where('user_id',$user_id)->where('cartoon_id',$id)
                    ->where('page',$list_id)
                    ->first()){
                    if($user->gold - $cartoon_list->pay <0){
                        return "<script>alert('余额不足哦');window.history.go(-1)</script>";
                    }{
                        $user->update([
                            'gold'=>$user->gold - $cartoon_list->pay
                        ]);
                        Footprint::create([
                            'user_id'=>$user_id,
                            'cartoon_id'=>$id,
                            'page'=>$list_id,
                            'list_name'=>$cartoon_list->name
                        ]);
                    }
                }

            }else{
                return 'error';
            }

            if($collect =  Collect::where('user_id',$user_id)->where('cartoon_id',$id)->first()){
                $collect_type = 'collect';
            }


        }else{
            if($cartoon_list->pay != 0){
                return "<script>alert('请先登陆');window.history.go(-1)</script>";
            }
        }




        return view('cartoon',[
            'cartoon'=>$cartoon_list,
            'collect_type'=>$collect_type,
        ]);
    }


    /**漫画目录页面
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function cartoon_list($id)
    {
        if(!$cartoon_list =  Cartoon_list::where('cartoon_id',$id)->orderBy('id','asc')->get()){
            return 'error ! 未找到此页面';
        }

        $status = Cartoon::find($id)->end==1?'已完结':'连载中';
        return view('list',[
            'cartoons'=>$cartoon_list,
            'status'=>$status,
            'id'=>$id,
        ]);

    }

    /**分类页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cate(Request $request)
    {

        $cates = Cate::select(['id','name'])->get();
        $cartoons = Cartoon::select(['id','name','thumb','detail','introduce','hit']);
        if($request->cate_id){
            $cartoons =  $cartoons->where('cate_id',$request->cate_id);
        }
        if(isset($request->is_end) && $request->is_end !=3  && !empty($request->is_end)){
            $cartoons =  $cartoons->where('end',$request->is_end);
        }
        if(isset($request->is_free) && $request->is_free !=3 &&  !empty($request->is_free)){
            $cartoons =  $cartoons->where('pay',$request->is_free);
        }


        $cartoons = $cartoons->get();

        return view('cate',[
            'type'=>config('mh.type.cate'),
            'cates'=>$cates,
            'cartoons'=>$cartoons,
        ]);
    }


    /**书架
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bookcase()
    {

        if($user_id = $this->checkLogin()){

            $cartoon_ids = Collect::where('user_id',$user_id)->pluck('cartoon_id')->toArray();

            $cartoons =Cartoon::with(['footprint'=>function ($q) use ($user_id){
                $q->where('user_id',$user_id)->orderBy('created_at','desc')->limit(1);
            }])->whereIn('id',$cartoon_ids)->get();


            return view('bookcase',[
                'cartoons'=>$cartoons,
                'type'=>config('mh.type.bookcase'),
            ]);
        }

        return "<script>alert('请先登陆');window.history.go(-1)</script>";

//        return  view('login');


    }

    public function listScript($cartoon_id,$num)
    {
        //每页漫画数量
        $average = 15;
        //多少页
        $pages = ceil($num/$average);

        for ($i=1;$i<=$pages;$i++){
            $k = $i*$average-$average+1;
            $url='';
            for ($j=$k;$j<=$i*15;$j++){
               $url.='/cartoon/003奇怪的导演/'.$j.'.jpg'.PHP_EOL;
            }
            rtrim($url);
            Cartoon_list::create([
                'cartoon_id'=>$cartoon_id,
                'name'=>'第'.$i.'话',
                'url'=>$url,
                'page'=>$i,
                'pay'=>'50',
            ]);
        }


    }
    function download($url='http://t.wzfcyy.cn/www.wzfcyy.cn/125131/4/1.jpg',$save_dir='image/',$filename='',$type=0){
        if(trim($url)==''){
            return array('file_name'=>'','save_path'=>'','error'=>1);
        }
        if(trim($save_dir)==''){
            $save_dir='./';
        }
        if(trim($filename)==''){//保存文件名
            $ext=strrchr($url,'.');

            if($ext!='.gif'&&$ext!='.jpg'){
                return array('file_name'=>'','save_path'=>'','error'=>3);
            }
            $filename=time().$ext;
        }
        if(0!==strrpos($save_dir,'/')){
            $save_dir.='/';
        }
        //创建保存目录
        if(!file_exists($save_dir)&&!mkdir($save_dir,0777,true)){
            return array('file_name'=>'','save_path'=>'','error'=>5);
        }
        //获取远程文件所采用的方法
        if($type){
            $ch=curl_init();
            $timeout=5;
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
            $img=curl_exec($ch);
            curl_close($ch);
        }else{
                ob_start();
                readfile($url);
                $img=ob_get_contents();
                ob_end_clean();

        }
        //$size=strlen($img);
        //文件大小
        $fp2=@fopen($save_dir.$filename,'a');
        fwrite($fp2,$img);
        fclose($fp2);
        unset($img,$url);
//        return array('file_name'=>$filename,'save_path'=>$save_dir.$filename,'error'=>0);
    }
    public function preg_image()
    {
        $mulu = '67820';
        $num = 32;
        set_time_limit(0);
        for ($i=1;$i<=$num;$i++){

            for ($j=1;$j<=30;$j++){
                $url =  'http://t.wzfcyy.cn/www.wzfcyy.cn/'.$mulu.'/'.$i.'/'.$j.'.jpg';
                try{
                    $this->download($url,'image/'.$mulu);
                }catch (\Exception $exception){
                    continue;
                }

            }


        }


    }



}
