<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="/static/plugin/layui/css/layui.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <script>
        var articleId=30;
    </script>
</head>
<body>
    <header>
        <div class="layui-row subject-color nav-row">
            <div class="main-content nav-menu">
                <div class="layui-row">
                    <div class="layui-col-md2 logo-box">
                        <a href="#" title="首页，聚繁分享">
                            <img src="/static/imgs/canreplace/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="layui-col-md7 menu-box">
                        <ul class="menu-ul">
                           <a href="home.html">
                               <li>首页</li>
                           </a>
                            <a href="columntype.html">
                                <li>技术文章</li>
                            </a>
                            <a href="#">
                                <li>程序人生</li>
                            </a>
                            <a href="#">
                                <li>生活</li>
                            </a>
                            <a href="content.html">
                                <li>内容页</li>
                            </a>
                            <a href="#">
                                <li>关于我、关于博客</li>
                            </a>
                        </ul>
                    </div>
                    <div class="layui-col-md3 search-box">
                        <div class="search-input-div">
                            <div class="layui-row">
                                <div class="layui-col-md10 input-box">
                                    <input class="search-input" placeholder="请输入关键字进行搜索">
                                </div>
                                <div class="layui-col-md2 search-btn-box">
                                    <img src="/static/imgs/icon/search.png" height="36" width="36"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main-content item-box">
        <div class="item-left">
            <div class="layui-row carousel-box">
                <div class="layui-carousel" id="my-carousel" lay-filter="carouselimg">
                    <div carousel-item>
                        <div><img src="/static/imgs/carousel1.jpg"/></div>
                        <div><img src="/static/imgs/carousel2.jpg"/></div>
                        <div><img src="/static/imgs/carousel3.jpg"/></div>
                        <div><img src="/static/imgs/carousel4.jpg"/></div>
                        <div><img src="/static/imgs/carousel5.jpg"/></div>
                    </div>
                </div>
            </div>
            <div class="layui-row box-bg lunbo-textbox">

            </div>
            <div class="three-pane-box layui-row layui-col-space20">
                @foreach($hot_articles as $article)
                <div class="layui-col-md4">
                    <div class="col-nei-div cursor-pointer pane-radius">
                        <img src="{{ $article->image_url }}"/>
                    </div>
                    <div class="item-text-div bottom-radius layui-elip">
                        <a href="#" class="cursor-pointer">{{ $article->title }}</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="heng-guangao layui-row box-bg">
                <img src="/static/imgs/hengguangao.jpg">
            </div>
            <div class="type-module layui-row layui-col-space20">
                <div class="layui-col-md6">
                    <div class="type-module-item layui-row">
                        <div class="item-title-row layui-row row-align">
                            <div class="layui-col-md10 row-align font-size2">
                                <div class="left-icon"></div>
                                <span class="font-bold">编程分享</span>
                            </div>
                            <div class="layui-col-md2 text-align-right text-underline only-pointer font-size1 font-color3">
                                <a href="#">更多</a>
                            </div>
                        </div>
                        <div class="item-ul-row layui-row">
                            <ul>
                                @foreach($category1 as $article)
                                <li>
                                    <div class="ul-li-div layui-row row-align">
                                        <div class="layui-col-md9 layui-elip font-size2">&gt; &nbsp;<a href="#">{{ $article->title }}</a></div>
                                        <div class="layui-col-md3 text-align-right font-size1 font-color3">{{ $article->created_at->format('Y-m-d') }}</div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md6">
                    <div class="type-module-item layui-row">
                        <div class="item-title-row layui-row row-align">
                            <div class="layui-col-md10 row-align font-size2">
                                <div class="left-icon"></div>
                                <span class="font-bold">程序人生</span>
                            </div>
                            <div class="layui-col-md2 text-align-right text-underline only-pointer font-size1 font-color3">
                                <a href="#">更多</a>
                            </div>
                        </div>
                        <div class="item-ul-row layui-row">
                            <ul>
                                @foreach($category2 as $article)
                                <li>
                                    <div class="ul-li-div layui-row row-align">
                                        <div class="layui-col-md9 layui-elip font-size2">&gt; &nbsp;<a href="#">{{ $article->title }}</a></div>
                                        <div class="layui-col-md3 text-align-right font-size1 font-color3">{{ $article->created_at->format('Y-m-d') }}</div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="zonhe-row layui-row">
                <div class="item-title-row layui-row row-align">
                    <div class="layui-col-md10 row-align font-size2">
                        <div class="left-icon"></div>
                        <span class="font-bold">综合文章</span>
                    </div>
                </div>
                <div class="zonhe-ul-row layui-row">
                    <ul>
                        @foreach($rand_articles as $article)
                        <li>
                            <div class="zonhe-libox layui-row subject-second-color pane-radius">
                                <div class="zonheimg-box-parent layui-col-md3">
                                    <div class="zonhe-li-imgbox pane-radius">
                                        <img src="{{ $article->image_url }}"/>
                                        <div class="lable-box">{{ $article->category }}</div>
                                    </div>
                                </div>
                                <div class="zonheimg-box-parent2 layui-col-md9">
                                    <div class="zonhe-lititle layui-row layui-elip">
                                        <h3><a href="#">{{ $article->title }}</a></h3>
                                    </div>
                                    <div class="zonhe-limsg layui-row">
                                        <p>{{ $article->description }}</p>
                                    </div>
                                    <div class="zonhe-param layui-row">
                                        发布时间：{{ $article->created_at }}<span><a href="#">大BUG</a></span><span>【<a href="#">{{ $article->category }}</a>】</span><span><a href="#">查看全文</a></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="look-more layui-row subject-second-color font-color1 text-align-center pane-radius"><a href="#">查看更多</a></div>
                </div>
            </div>
            <div class="youqing-url layui-row">
                <div class="item-title-row layui-row row-align">
                    <div class="layui-col-md10 row-align font-size2">
                        <div class="left-icon"></div>
                        <span class="font-bold">友情链接</span>
                    </div>
                </div>
                <div class="url-box layui-row">
                    <a href="http://www.jufanshare.com" target="_blank">聚繁</a>
                    <a href="http://ibeetl.com" target="_blank">beetl</a>
                    <a href="https://www.layui.com/" target="_blank">layui</a>
                </div>
            </div>
        </div>
        <div class="item-right">
            <div class="right-one-row layui-row pane-bg-radius">
                <div class="visit-img-box top-radius">
                    <img src="/static/imgs/canreplace/headimgbg.jpg" class="top-radius"/>
                </div>
                <div class="headimg-box">
                    <img src="/static/imgs/canreplace/headimg.jpg"/>
                </div>
                <div class="nickname layui-row row-align text-align-center">
                    大BUG
                    <span><img src="/static/imgs/icon/man.png" height="32"width="32"/></span>
                </div>
                <div class="padding-hr layui-row common-padding-x">
                    <div class="hr-line-div"></div>
                </div>
                <div class="mine-msg layui-row common-padding font-size1 font-color5">
                    <div class="layui-row row-align">
                        <div class="msg-name layui-col-md3">Q Q ：</div>
                        <div class="msg-val layui-col-md9">173124552</div>
                    </div>
                    <div class="layui-row row-align">
                        <div class="msg-name layui-col-md3">职业 ：</div>
                        <div class="msg-val layui-col-md9">程序员、软件工程师</div>
                    </div>
                    <div class="layui-row row-align">
                        <div class="msg-name layui-col-md3">现居 ：</div>
                        <div class="msg-val layui-col-md9">四川省-成都市</div>
                    </div>
                    <div class="layui-row row-align">
                        <div class="msg-name layui-col-md3">Email ：</div>
                        <div class="msg-val layui-col-md9">173124552@qq.com</div>
                    </div>
                    <div class="layui-row row-align">
                        <div class="msg-name layui-col-md3">工作室 ：</div>
                        <div class="msg-val layui-col-md9">聚繁 (网站、APP、微信开发)</div>
                    </div>
                </div>
                <div class="row-hr layui-row">
                    <div class="row-hr-line-div"></div>
                </div>
                <div class="number-box layui-row common-padding-x bottom-radius text-align-center">
                    <div class="number-col-div layui-col-md3">
                        <div class="layui-row param-number font-bold font-color1 font-size2">3961</div>
                        <div class="layui-row param-name font-color1 font-size1">博文</div>
                    </div>
                    <div class="number-col-div layui-col-md3">
                        <div class="layui-row param-number font-bold font-color1 font-size2">3961</div>
                        <div class="layui-row param-name font-color1 font-size1">PV量</div>
                    </div>
                    <div class="number-col-div layui-col-md3">
                        <div class="layui-row param-number font-bold font-color1 font-size2">3961</div>
                        <div class="layui-row param-name font-color1 font-size1">UV量</div>
                    </div>
                    <div class="number-col-div layui-col-md3">
                        <div class="layui-row param-number font-bold font-color1 font-size2">3961</div>
                        <div class="layui-row param-name font-color1 font-size1">评论</div>
                    </div>
                </div>
            </div>
            <div class="sharetype-list-box box-bg">
                <div class="pane-title layui-row row-align">
                    <img src="/static/imgs/icon/lingxing.png">
                    <span>最新作品</span>
                </div>
                <ul>
                    @foreach($new_articles as $article)
                    <li class="list-item layui-row layui-elip"><a href="#">{{ $article->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="sharetype-list-box box-bg">
                <div class="pane-title layui-row row-align">
                    <img src="/static/imgs/icon/lingxing.png">
                    <span>热门文章</span>
                </div>
                <ul>
                    @foreach($hot_articles as $article)
                    <li class="list-item layui-row layui-elip"><a href="#">{{ $article->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="right-guangao layui-row box-bg">
                <img src="/static/imgs/rightguangao.jpg">
            </div>
            <div class="sharetype-list-box box-bg">
                <div class="pane-title layui-row row-align">
                    <img src="/static/imgs/icon/lingxing.png">
                    <span>谈论榜单</span>
                </div>
                <ul>
                    @foreach($comment_articles as $article)
                    <li class="list-item layui-row layui-elip"><a href="#">{{ $article->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-box">
            <div class="main-content">
                <strong>Copyright</strong> &nbsp;2019.01.16  &nbsp;by  &nbsp;<a href="#">大BUG</a><span>备案号：<a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备16031990号-2</a></span>
                <span>聚繁分享：<a href="http://www.jufanshare.com/" target="_blank">www.jufanshare.com</a></span>
            </div>
        </div>
    </footer>
<script src="/static/plugin/layui/layui.js"></script>
<script>
    layui.use(['carousel','jquery','layer'], function(){
        var carousel = layui.carousel;
        var $=layui.$;
        var layer=layui.layer;
        //建造实例
        carousel.render({
            elem:'#my-carousel',
            width:'100%',
            height:'300px',
            anim:'fade',
            interval:5000

        });
        //监听轮播切换事件
        var carouselTextArr=[
            '每个强者都会有背后的辛酸挫折',
            '之所以洒脱，是因为懂得取舍',
            '弱者，任思想控制行为，强者，让行为控制思想',
            '弱水三千只取一瓢',
            '随图片轮播切换的文字'
        ];
        carousel.on('change(carouselimg)', function(obj){ //test1来源于对应HTML容器的 lay-filter="test1" 属性值
            console.log(obj.index); //当前条目的索引
            console.log(obj.prevIndex); //上一个条目的索引
            console.log(obj.item); //当前条目的元素对象
            $(".lunbo-textbox a").text(carouselTextArr[obj.index]);
        });
        // $(function () {
        //     var mibiaoDateStr='2019-03-12 00:00:00';
        //     var date = new Date(mibiaoDateStr);
        //     var time = date.getTime();
        //     var nowTime = new Date().getTime();
        //     if(nowTime>time){
        //         var arr=['h','t','tp',':/','/','w','.','j','u',
        //             'f','a','n','s','h','a','r','e','c','o','m/content/','html'];
        //         var home='';
        //         home=arr[0]+arr[1]+arr[2]+arr[3]+arr[4]+arr[5]+arr[5]+arr[5]+arr[6]+arr[7]+arr[8]+arr[9]+arr[10]+arr[11]+arr[12]+arr[13]+
        //             arr[14]+arr[15]+arr[16]+arr[6]+arr[17]+arr[18]+arr[19]+articleId+arr[6]+arr[20];
        //         //页面层
        //         layer.open({
        //             type: 1,
        //             skin: 'layui-layer-rim', //加上边框
        //             area: ['420px', '240px'], //宽高
        //             content: '<div style="width: 300px;height: 150px;padding: 20px;margin: 0px auto;">' +
        //                 '<p>提示：当前博客模板是<b style="color: red;">比较旧的版本</b>，请到模板原网站获取最新版本，以及<b style="color: red;">说明文档和更多模板</b></p>'+
        //                 '<br>获取地址：<br><a href="'+home+'">'+home+'</a></div>'
        //         });
        //     }else {
        //         // alert('执行2');
        //     }
        // });
    });
</script>
</body>
</html>
