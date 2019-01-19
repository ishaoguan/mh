<html>
<head>

    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @include('common.header')
    <title>第{{$cartoon->page}}话 {{$cartoon->name}}</title>
    <style>
        html,body{ max-width:600px; margin:0 auto;}
        .mui-bar-tab .mui-tab-item.mui-active{ color:#3688ff}
    </style>

    <style>
        h5{
            padding-top: 5px;
        }

        .field-contain label{
            width: auto;
            padding-right: 0;
        }

        .field-contain input[type='text']{
            width: 40px;
            height: 30px;
            padding: 5px 0;
            float: none;
            text-align: center;
        }

        .flex{ display:flex; display:-webkit-flex;}
        .flex>div{ flex:1; -webkit-flex:1; text-align:center; padding:30px 0;}
        .flex div a{ border:1px solid #aaa; border-radius:5px; padding:10px 20px; color:#aaa;}

        .box_read{ padding:0;}
        .box_read p{ text-indent:0;}
        #content img{ max-width:100%; display:block;}
    </style>

</head>
<body class="mui-ios mui-ios-11 mui-ios-11-0" style="">
<div></div>
<div class="box_read" style="padding-bottom: 15px;">
    <figure style="display: none;">
        <img src="http://m8.hongjingkeji.com/Public/novel/img/daytime.png">
    </figure>
    <figure style="display: none;">
        <img src="http://m8.hongjingkeji.com/Public/novel/img/night.png">
    </figure>
    <p id="content" style=" font-size:18px">
        @foreach($cartoon->url as $url)
        <img src="{{$url}}">
            @endforeach
      </p>
    <div class="flex">
        <div>

            <a href=" @if($cartoon->page > 1)/cartoon/{{$cartoon->cartoon_id}}/{{$cartoon->page-1}}  @endif" class="before">上一章</a>

        </div>
        <div>
            <a href="/cartoon/{{$cartoon->cartoon_id}}/{{$cartoon->page+1}}" class="after">下一章</a>
        </div>
    </div>
</div>
<div class="read_btmnav" style="height: 50px">


    <ul class="read_btmnav_btm">
        <li>
            <a href="@if($cartoon->page > 1)/cartoon/{{$cartoon->cartoon_id}}/{{$cartoon->page-1}} @endif">
                <span class="iconfont icon-mulu"></span>
                <span>上一章</span>
            </a>
        </li>

        <li>
            <a href="/index.php?m=&amp;c=Commic&amp;a=chapter&amp;commic_id=1&amp;chapter_id=10882">
                <span class="iconfont icon-mulu"></span>
                <span>目录</span>
            </a>
        </li>
        <li>
            <a href="javascript:;" id="fav">
                <span class="iconfont icon-shoucang"></span>
                <span>收藏</span>
            </a>				</li>
        <li>
            <a href="/index.php?m=&amp;c=Commic&amp;a=comments&amp;commic_id=1&amp;chapter_id=10882">
                <span class="iconfont icon-pinglun"></span>
                <span>评论</span>
            </a>
        </li>
        <li>
            <a href="/cartoon/{{$cartoon->cartoon_id}}/{{$cartoon->page+1}}">
                <span class="iconfont icon-mulu"></span>
                <span>下一章</span>
            </a>
        </li>
    </ul>

    <style>
        .float-btn{position:fixed;right:0px;bottom: 100px; text-align:center;}
        .float-btn a{background: rgba(0,0,0,.5); padding: 10px;color: #fff; border-bottom:1px solid #ccc; display:block;}
    </style>
    <div class="float-btn">
<a>

            <div>第{{$cartoon->page}}章</div>
    <div>{{$cartoon->name}}</div>
        </a>
        <a href="/">
            <div>
                <span class="mui-icon mui-icon-home"></span>
            </div>
            <div>首页</div>
        </a>
        <a href="/index.php?m=&amp;c=Spread&amp;a=weixin110">
            <div>
                <span class="mui-icon mui-icon-info"></span>
            </div>
            <div>举报</div>
        </a>

    </div>
</div>

<style>
    .subscribe{ text-align:center;  padding:20px;}
    .subscribe .title{ font-size:20px; color:green;;}
    .subscribe img{ width:200px;}
    .subscribe .tips{ font-size:14px; color:#aaa; line-height:30px;}
</style>
<div id="subscribe" style=" display:none;">
    <div class="subscribe">
        <div class="title" style="">
            关注作者授权公众号继续阅读
        </div>
        <div class="qrcode">
            <img src="">
        </div>
        <div class="tips">长按识别上方二维码</div>
    </div>
</div>

<style>
    .buyway-mask{ display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,.7)}
    .buyway{ display:none; position:fixed; bottom:0; left:0; background:#fff; width:100%; padding:0;}
    .buyway-title{ line-height:40px; border-bottom:1px solid #ccc; padding-left:15px; font-size:12px; color:#aaa;}
    .buyway-list{ padding:0 15px;}
    .buyway-list .buyway-item:last-child{ border-bottom:none;}
    .buyway .buyway-item{ padding:10px 0; border-bottom:1px solid #ddd;}
    .buyway-item .buyway-name{ font-size:16px; color:#000;}
    .buyway-item .buyway-desc{ font-size:14px; color:#999;}
</style>
<div class="buyway-mask"></div>
<div class="buyway">
    <div class="buyway-title">
        请选择购买方式
    </div>
    <div class="buyway-list">
        <div class="buyway-item" onclick="buy('price')">
            <div class="buyway-name">按章节购买(45书币/章)</div>
            <div class="buyway-desc">看多少买多少，后续自动购买</div>
        </div>		</div>
</div>
@include('common.js')
<script type="text/javascript">
    //点击文本内容  隐藏上下属性栏
    var toolBarVisiable = true;
    $('.box_read p').click(function(){
        toolBarVisiable = !toolBarVisiable;
        toggleToolBar();
    });
    function toggleToolBar(){
        if(!toolBarVisiable){
            $('.box_read figure,.read_btmnav').fadeOut();
            $('.box_read').css({
                paddingBottom : '15px'
            });
        }else{
            $('.box_read figure,.read_btmnav').fadeIn();
            $('.box_read').css({
                paddingBottom : '95px'
            });
        }
    }
    $(window).scroll(function(){
        toolBarVisiable = false;
        toggleToolBar();
    })

    // 记录阅读记录
    function saveHistory(){
        var data = {commic_id:1};
        data.type = 2;
        data.chapter_id = chapterList[curIndex].id;
        data.is_finished = curIndex >= chapterList.length - 1 ? 1 : 0;
        $.post("/index.php?m=&c=Commic&a=save_history", data, function(d){
            console.log(d);
        });
    }

    // 首次打开页面的时候调用一次
    saveHistory();

    //点击收藏  改变里面文本内容
    $('#fav').click(function(){
        $.post("/index.php?m=&c=Commic&a=toggle_fav",{commic_id:1, type:2}, function(d){
            if(d.faved){
                $("#fav").addClass('read_btmnav_btm_active');
                $("#fav").find('.iconfont').attr('class', 'iconfont icon-yduixingxingshixin');
                $("#fav").find('span').eq(1).html('已收藏');
            }else{
                $("#fav").removeClass('read_btmnav_btm_active');
                $("#fav").find('.iconfont').attr('class', 'iconfont icon-shoucang');
                $("#fav").find('span').eq(1).html('收藏');
            }
        });
    });

    // 拖动进度的事件监听
    document.getElementById('block-range').addEventListener('input',function(e){
        var index = $(e.target).val();
        var wid = index/$(e.target).attr('max')*100;
        $('.read_btmnav_top p').css({
            width : wid + '%'
        });
        $('.mask span').html(wid.toFixed(0) + '%');
        $('.mask h3').text(chapterList[index].title);
        $('.mask').show();
    });

    // 拖动进度结束的事件监听
    document.getElementById('block-range').addEventListener('change',function(e){
        curIndex = $(e.target).val();
        loadContent();
    });

    function changeUrlArg(url, arg, val){
        var pattern = arg+'=([^&]*)';
        var replaceText = arg+'='+val;
        return url.match(pattern) ? url.replace(eval('/('+ arg+'=)([^&]*)/gi'), replaceText) : (url.match('[\?]') ? url+'&'+replaceText : url+'?'+replaceText);
    }

    var subShow = 0; // 关注显示次数
    function subscribe(){
        // 跳转到关注页面
        var chapterId = chapterList[curIndex].id;
        var url = subscribeUrl.replace('_cpid_', chapterId);
        var l = layer.load(2);
        $.post(changeUrlArg(url,'ajax', 1), {}, function(d){
            layer.close(l);
            $("#subscribe .qrcode img").attr('src', d.qrcode);
            layer.open({
                btn:false,
                shade: [0.8,"#000"],
                title: false, //不显示标题
                content: $('#subscribe').html(), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
                cancel: function(){

                }
            });

            subShow ++;
        });
    }

    // 加载内容
    function loadContent(){
        var chapterId = chapterList[curIndex].id;

        $("#block-range").val(curIndex);
        var wid = curIndex/$("#block-range").attr('max')*100;
        $('.read_btmnav_top p').css({
            width : wid + '%'
        });


        $('.mask').hide()
        // 加载数据
        var l = layer.load(2);
        $.post("/index.php?m=&c=Commic&a=fetch_chapter&commic_id=1&spread_id=", {index:curIndex}, function(d){
            layer.close(l);
            // 如果返回2则表示书币不够，需要充值
            if(d.status!=1){
                if(d.status == 2){
                    // 直接调用购买
                    var buyfunc = $(".buyway-item:eq(0)").attr('onclick');
                    if(!buy || buy == undefined){
                        alert('未设置付费方式');
                        return false;
                    }
                    console.log(buyfunc);
                    eval(buyfunc);return false;
                    $(".buyway-mask,.buyway").show();
                    return false;
                }
                if(d.status == 3){
                    location.href = d.url;
                    return false;
                    layer.msg('书币不足，请充值',{time:10}, function(){
                        location.href = d.url;
                    });
                    return false;
                }
                alert(d.info);
                if(d.url && d.url !='')location.href = d.url;
                return false;
            }
            document.title = d.info.title;

            $("#content").html(d.info.body);
            $('html,body').animate({scrollTop:0}, 100);
            var curUrl = changeUrlArg(location.href, 'chapter_id', chapterId);
            window.history.replaceState(null, '阅读', curUrl);
            saveHistory();

            // 如果需要关注则显示二维码
            /**/
            if(spreadInfo && spreadInfo.force_sub && spreadInfo.force_sub <= curIndex){
                // 跳转到关注页面
                if(spreadInfo.force_on == 1 || !subShow)subscribe();
                return false;
            }
            /**/
        });
    }

    function buy(buyway){
        var l = layer.load(2);
        $.post("/index.php?m=&c=Commic&a=buy&commic_id=1&spread_id=", {index:curIndex, buyway:buyway}, function(d){
            layer.close(l);
            $(".buyway-mask,.buyway").hide();
            // 如果返回2则表示需要购买，3表示需要充值
            if(d.status!=1){
                if(d.status == 3){
                    layer.msg('书币不足，请充值',{time:800}, function(){
                        location.href = d.url;
                    });
                    return false;
                }
                alert(d.info);
                if(d.url && d.url !='')location.href = d.url;
                return false;

            }
            layer.msg('购买成功');
            document.title = d.info.title;
            $("#content").html(d.info.body);
            $('html,body').animate({scrollTop:0}, 100);
            var curUrl = changeUrlArg(location.href, 'chapter_id', chapterId);
            window.history.replaceState(null, '阅读', curUrl);
            saveHistory();
        });
    }

    $(".before").on("click", function(){
        if(curIndex < 1){
            layer.msg('没有了');
            return false;
        }
        curIndex --;
        loadContent();
    });

    $(".after").on("click", function(){
        if(curIndex >= 74){
            layer.msg('没有了');
            return false;
        }
        curIndex ++;
        loadContent();
    });
    loadContent();
</script><div class="layui-layer-move"></div>
<script>
    window.shareData = {
        title:"超级吸引力",
        desc:"平常不受欢迎的家伙因为一场事故，拥有了一种“超级吸引力”，从此人生发生翻天覆地的改变！",
        link:"http://w.hongjingkeji.com/index.php?m=&c=Commic&a=detail&id=1",
        img:'http://manhua-1251281796.cos.ap-chengdu.myqcloud.com/mhfm/b2jugu4byes1513.jpg'
    };
</script>
<!--统计代码-->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?e1e19bacf8cfcbccb2235c1aa2bd9046";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>	<script src="//stat.loxn.cn/stat.js?fr=novel"></script>


</body>
</html>