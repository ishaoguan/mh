<html><head>
    <title>书库</title>
@include('common.header')
    <style>
        .cftion_top div select{ -webkit-appearance:none;}
    </style>
</head>
<body style="background-color: #F4F4F4;">
<div class="box_cftion">
    <header>
        <a href="/index.php?m=&amp;c=commic&amp;a=index">
            <span class="iconfont icon-xiangzuojiantou"></span>
        </a>
        <span>目录</span>
    </header>
    <div class="cftion_top">
        <div>类型</div>
        <div>
            <select style="margin-top:10px" name="sex_type" default="" onchange="filter(this)">
                <option value="" selected="selected">频道</option>
                <option value="">全部</option>
                <option value="1">男生</option>
                <option value="2">女生</option>
            </select>
        </div>
        <div>
            <select style="margin-top:10px" name="is_finished" default="" onchange="filter(this)">
                <option value="" selected="selected">状态</option>
                <option value="">全部</option>
                <option value="1">连载</option>
                <option value="2">完结</option>
            </select>
        </div>
        <div>
            <select style="margin-top:10px" name="is_free" default="" onchange="filter(this)">
                <option value="" selected="selected">属性</option>
                <option value="">全部</option>
                <option value="1">付费</option>
                <option value="2">免费</option>
            </select>
        </div>
        <script src="https://hm.baidu.com/hm.js?8b510fc5904051edbfe74a023790a160"></script><script>
            var param = [];
            param.p = 1;
            var url = "/index.php?m=&c=commic&a=cates";
            function filter(obj){
                var field = $(obj).attr('name');
                var value = $(obj).val();
                param[field] = value;
                var query = [];
                for(var x in param){
                    query.push(x +'=' + param[x]);
                }
                queryStr = query.join("&");
                location.href = url + "&" + queryStr;
            }
        </script>
    </div>
    <div class="cftion_content">
        <div class="tab_menu">
            <ul>
                <li><a class="@if(!isset($_REQUEST['cate_id']))selected @endif" href="/cate">全部</a></li>
                @foreach($cates as $cate)
                    <li><a class="@if(isset($_REQUEST['cate_id']) && $_REQUEST['cate_id'] == $cate->id)selected @endif" href="/cate?cate_id={{$cate->id}}">{{$cate->name}}</a></li>
                    @endforeach
            </ul>
        </div>
        <div class="tab_box">
            <div>
                <ul class="tab_box_list">
                    @foreach($cartoons as $cartoon)
                    <li onclick="location.href='/index.php?m=&amp;c=commic&amp;a=detail&amp;id=500'">
                        <img style="height: 150px" src="{{$cartoon->thumb}}">
                        <div class="tab_box_list_right">
                            <h3>{{$cartoon->name}}</h3>
                            <p class="tab_box_list_txt" style=" height:40px; line-height:20px;white-space:normal;">简介：{{$cartoon->detail}}</p>
                            <p class="tab_box_list_txt_btm" style="margin-top:5px;">
                                <span>作者：佚名</span>

                                <span class="tab_box_list_txt_btm_span">
	            						<span>{{$cartoon->hit}}</span>
	            						<span style="padding: 0;border: none;">热度</span>
	            					</span>
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>


        </div>
    </div>
</div>
@include('common.js')
<script>
    if ('addEventListener' in document) {
        document.addEventListener('DOMContentLoaded', function() {
            FastClick.attach(document.body);
        }, false);
    }
</script>



<script>
    $('ul.tab_box_list').infiniteScroll({
        path: '.pagination .next',
        append: 'ul.tab_box_list li',
        history: false,
        hideNav: '.pages',
        checkLastPage: '.pagination .next',
        status: '.page-load-status'
    });

</script>
<script type="text/javascript" charset="utf-8">
    //设计交互
    $(function(){
        var li_a= $(".tab_menu ul li a");
        li_a.click(function(){
            $(this).addClass("selected");
            $(this).parent().siblings().children().removeClass("selected");
            var index =  li_a.index(this);
            $(".tab_box > div").eq(index).show().siblings().hide();
        });
    });

    $("li[href]").on('click', function(){
        location.href = $(this).attr('href');
    });

    // 调整默认选择内容
    $("select").each(function(index, element) {
        $(element).find("option[value='" + $(this).attr('default') + "']:eq(0)").attr('selected', 'selected');
    });
</script>
</body></html>