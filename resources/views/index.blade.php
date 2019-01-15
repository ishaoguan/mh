<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="http://m8.hongjingkeji.com/Public/anime/css/mui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://m8.hongjingkeji.com/Public/anime/css/reset.css">
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_921482_i89ed3fqez.css">
    <link rel="stylesheet" href="http://m8.hongjingkeji.com/Public/anime/css/swiper-3.4.2.min.css">
    <link rel="stylesheet" href="http://m8.hongjingkeji.com/Public/anime/css/anime.css">
    <style>
        .search{ display:block; width:30px; line-height:30px; text-align:center; background:rgba(0,0,0,.5); border-radius:50%;
            position:absolute; top:10px; right:10px; color:#fff; z-index:10;
        }
        .search-form{ display:none; position:absolute; top:10px; padding:15px; padding-top:0; opacity:0.7; z-index:20; width:100%;line-height:40px;}
        .search-form input{ text-align:center; padding:0 50px 0 5px; box-sizing:border-box; width:100%; height:40px; line-height:40px; background:#fff; border-radius:2px;}
        .search-form .search-btn{ position:absolute; right:10px; top:0; padding:0 15px;}
        .title{ font-weight:bold;}
    </style>
    <meta name="poweredby" content="dragondean">
    <title>Title</title>
</head>
<body style="background:#fff">
<!-- 头部tab -->
<!--header id="header">
    <div class="public_header">
        <a href="javascript:;" class="public_header_a public_header_active">小说</a>
        <a href="/index.php?m=&c=Commic&a=index" class="public_header_a">漫画</a>
        <a href="##" class="search"><span class="iconfont icon-sousuo"></span></a>
    </div>
</header-->
<a href="/index.php?m=&amp;c=Commic&amp;a=search_form" href2="javascript:$('.search-form').show();$('.search').hide();;" class="search"><span class="iconfont icon-sousuo"></span></a>
<div class="search-form">
    <input type="search" name="keyword">
    <a href="javascript:location.href='http://at.alicdn.com/index.php?m=&amp;c=Commic&amp;a=search&amp;keyword='+$('input[name=keyword]').val();" class="search-btn"><span class="iconfont icon-sousuo"></span></a>
</div>
<div class="box_index">
    <div class="bg_pad" style="padding: 0;">

        <div class="index_top" style=" padding-top:0;">
            <!-- 头部banner -->
            <div class="swiper-container swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-1166px, 0px, 0px); transition-duration: 0ms;">

                    <a href="javascript:;" class="swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 583px;">
                        <img src="{{$banners[0]['image']}}" alt="">
                    </a>
                    <a href="javascript:;" class="swiper-slide swiper-slide-duplicate-active swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="0" style="width: 583px;">
                        <img src="{{$banners[1]['image']}}" alt="">
                    </a>
                    <a href="javascript:;" class="swiper-slide swiper-slide-duplicate swiper-slide-active swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 583px;">
                        <img src="{{$banners[2]['image']}}" alt="">
                    </a>


                </div>
                <div class="swiper-pagination swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span></div>
                <img src="http://m8.hongjingkeji.com/Public/anime/img/hu.png" style=" position:absolute; bottom:-2px; left:0; width:100%; z-index:9;">
            </div>
            <!--头部列表-->
            <ul class="list">
                <li>
                    <a href="http://at.alicdn.com/index.php?m=&amp;c=my&amp;a=invite">
                        <img style="width: 90%;" src="http://m8.hongjingkeji.com//Public/anime/img/1.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="http://at.alicdn.com/index.php?m=&amp;c=Commic&amp;a=rank">
                        <img style="width: 90%;" src="http://m8.hongjingkeji.com//Public/anime/img/2.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="http://at.alicdn.com/index.php?m=&amp;c=My&amp;a=charge">
                        <img style="width: 90%;" src="http://m8.hongjingkeji.com//Public/anime/img/3.png" alt="">
                    </a>
                </li>					</ul>
        </div>
    </div>
    <!--独家首发-->
    <div class="bg_pad index_product">
        <div class="index_product_top">
            <h3>
                <img src="http://m8.hongjingkeji.com/Public/anime/img/title1.png" style=" height:20px;">
                新品						<img src="http://m8.hongjingkeji.com/Public/anime/img/title2.png" style=" height:20px;">
            </h3>

        </div>
        <div class="cover">
            <a href="">
                <img src="{{$cartoons_f->thumb}}" alt="正在加载中...">
                <div class="introduce">
                    <p class="title">{{$cartoons_f->name}}</p>
                </div>
            </a>
        </div>
        <ul class="details_list details_list2">
            @foreach($cartoons as $cartoon)
            <li>
                <a href="http://at.alicdn.com/index.php?m=&amp;c=Commic&amp;a=detail&amp;id=1">
                    <img src="http://m8.hongjingkeji.com/Public/anime/img/300-150.png" style=" background:url({{$cartoon->thumb}}); background-size:cover">
                    <div class="introduce">
                        <p class="title">{{$cartoon->name}}</p>
                        <p class="details">{{$cartoon->introduce}}</p>
                    </div>
                </a>
            </li>
         	@endforeach
        </ul>

    </div>
    <div class="bg_pad index_product">
        <div class="index_product_top">
            <h3>
                <img src="http://m8.hongjingkeji.com/Public/anime/img/title1.png" style=" height:20px;">
                男生						<img src="http://m8.hongjingkeji.com/Public/anime/img/title2.png" style=" height:20px;">
            </h3>
            <!--p>
                <a href="javascript:;">
                    <span>更多</span>
                </a>
            </p-->
        </div>
        <div class="cover">
            <a href="">
                <img src="{{$cartoons_f->thumb}}" alt="正在加载中...">
                <div class="introduce">
                    <p class="title">{{$cartoons_f->name}}</p>
                </div>
            </a>
        </div>
        <ul class="details_list details_list2">
            @foreach($cartoons as $cartoon)
            <li>
                <a href="http://at.alicdn.com/index.php?m=&amp;c=Commic&amp;a=detail&amp;id=5">
                    <img src="http://m8.hongjingkeji.com/Public/anime/img/300-150.png" style=" background:url({{$cartoon->thumb}}); background-size:cover" alt="">
                    <div class="introduce">
                        <p class="title">{{$cartoon->name}}</p>
                        <p class="details">{{$cartoon->introduce}}</p>
                    </div>
                </a>
            </li>
                @endforeach
        </ul>

        <!--div class="tab_btn">
            <p>
                <span class="iconfont icon-huanyihuan"></span>
                <span>换一批</span>
            </p>
        </div-->
    </div>
    <div class="bg_pad index_product">
        <div class="index_product_top">
            <h3>
                <img src="http://m8.hongjingkeji.com/Public/anime/img/title1.png" style=" height:20px;">
                免费						<img src="http://m8.hongjingkeji.com/Public/anime/img/title2.png" style=" height:20px;">
            </h3>

        </div>
        <ul class="details_list details_list2">
            @foreach($cartoons as $cartoon)
                <li>
                    <a href="http://at.alicdn.com/index.php?m=&amp;c=Commic&amp;a=detail&amp;id=1">
                        <img src="http://m8.hongjingkeji.com/Public/anime/img/300-150.png" style=" background:url({{$cartoon->thumb}}); background-size:cover">
                        <div class="introduce">
                            <p class="title">{{$cartoon->name}}</p>
                            <p class="details">{{$cartoon->introduce}}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        <!--p class="ending">没有更多了~</p-->
    </div>
</div>

<div style=" background:#fff; padding-top:20px;">
    <div style=" text-align:center; background-color:#fff; background:url(http://m8.hongjingkeji.com/Public/anime/img/btbg.jpg) no-repeat; background-size:100%; background-position:bottom center; padding-bottom:50px;">
        <!--<img src="https://open.weixin.qq.com/qr/code?username=" style=" max-width:100px; margin:0 auto; border:2px solid #fae563;">-->
    </div>
</div>
<div style="height: 49px;"></div>
<!-- 底部nav -->
<nav class="mui-bar mui-bar-tab">
    <a href="http://at.alicdn.com/index.php?m=&amp;c=My&amp;a=history" class="mui-tab-item ">
        <div>
            <img class="posi_img" src="http://m8.hongjingkeji.com/Public/anime/img/nav_bookcase_red.png">
            <img src="http://m8.hongjingkeji.com/Public/anime/img/nav_bookcase_gray.png">
        </div>
        <span class="mui-tab-label">书架</span>
    </a>
    <a href="http://at.alicdn.com/index.php?m=&amp;c=Commic&amp;a=index" class="mui-tab-item mui-active">
        <div>
            <img class="posi_img" src="http://m8.hongjingkeji.com/Public/anime/img/nav_bookcity_red.png">
            <img src="http://m8.hongjingkeji.com/Public/anime/img/nav_bookcity_gray.png.png">
        </div>
        <span class="mui-tab-label">书城</span>
    </a>
    <a href="http://at.alicdn.com/index.php?m=&amp;c=Commic&amp;a=cates" class="mui-tab-item ">
        <div>
            <img class="posi_img" src="http://m8.hongjingkeji.com/Public/anime/img/nav_classify_red.png">
            <img src="http://m8.hongjingkeji.com/Public/anime/img/nav_classify_gray.png">
        </div>
        <span class="mui-tab-label">分类</span>
    </a>
    <a href="http://at.alicdn.com/index.php?m=&amp;c=My&amp;a=index" class="mui-tab-item ">
        <div>
            <img class="posi_img" src="http://m8.hongjingkeji.com/Public/anime/img/nav_mine_red.png">
            <img src="http://m8.hongjingkeji.com/Public/anime/img/nav_mine_gray.png">
        </div>
        <span class="mui-tab-label">我的</span>
    </a>
</nav>
<script src="https://hm.baidu.com/hm.js?8b510fc5904051edbfe74a023790a160"></script>
<!--<script src="//stat.loxn.cn/stat.js?fr=novel"></script>-->


<!--script src="/Public/anime/js/mui.min.js"></script-->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="http://m8.hongjingkeji.com/Public/anime/js/swiper-3.4.2.min.js"></script>
<script type="text/javascript" charset="utf-8">

    //banner 轮播
    var myswiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        loop: true,
        autoplay: 3000,
    });


</script>

</body>
</html>