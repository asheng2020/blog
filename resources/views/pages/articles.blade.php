@extends('layouts.app')
@section('title', '文章列表')

@section('content')
<div class="doc-container" id="doc-container">
    <div class="container-fixed">
        <div class="col-content">
            <div class="inner">
                <article class="article-list bloglist" id="LAY_bloglist" >
                    @include('pages.data')
                </article>

            </div>
        </div>
        <div class="col-other">
            <div class="inner">
                <div class="other-item" id="categoryandsearch">
                    <div class="search">
                        <label class="search-wrap">
                            <input type="text" id="searchtxt" placeholder="输入关键字搜索" />
                            <span class="search-icon">
                                <i class="fa fa-search"></i>
                            </span>
                        </label>
                        <ul class="search-result"></ul>
                    </div>
                    <ul class="category mt20" id="category">
                        <li data-index="0" class="slider"></li>
                        <li data-index="1"><a href="{{ route('articles.index') }}">全部文章</a></li>
                        @foreach($categories as $key => $category)
                        <li data-index="{{ $key + 2 }}"><a href="?category_id={{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!--右边悬浮 平板或手机设备显示-->
                <div class="category-toggle"><i class="layui-icon">&#xe603;</i></div>
                <div class="article-category">
                    <div class="article-category-title">分类导航</div>
                            <a href="{{ route('articles.index') }}">全部文章</a>
                            @foreach($categories as $key => $category)
                            <a href="?category_id={{ $category->id }}">{{ $category->name }}</a>
                            @endforeach
                    <div class="f-cb"></div>
                </div>
                <!--遮罩-->
                <div class="blog-mask animated layui-hide"></div>
                <div class="other-item">
                    <h5 class="other-item-title">热门文章</h5>
                    <div class="inner">
                        <ul class="hot-list-article">
                            @foreach($hot_articles as $hot_article)
                            <li> <a href="{{ route('articles.show', $hot_article->id )}}">{{ $hot_article->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="other-item">
                    <h5 class="other-item-title">置顶推荐</h5>
                    <div class="inner">
                        <ul class="hot-list-article">
                            @foreach($top_articles as $id => $top_article)
                            <li> <a href="{{ route('articles.show', $id) }}">{{ $top_article }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="other-item">
                    <h5 class="other-item-title">最近访客</h5>
                    <div class="inner">
                        <dl class="vistor">
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/72388EA977643E8F97111222675720B1/100"><cite>Anonymous</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/342F777E313DDF5CCD6E3E707BB0770B/100"><cite>Dekstra</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/EA5D00A72C0C43ECD8FC481BD274DEEC/100"><cite>惜i</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/EF18CEC98150D2442183AA30F05AAD7B/100"><cite>↙Aㄨ计划 ◆莪↘</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/3D8D91AD2BAFD36F5AC494DA51E270E6/100"><cite>.</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/B745A110DAB712A0E6C5D0B633E905D3/100"><cite>Lambert.</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/E9BA3A2499EC068B7917B9EF45C4D13C/100"><cite>64ღ</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/09F92966169272DD7DD9999E709A0204/100"><cite>doBoor</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/59991D53192643A1A651383847332EB6/100"><cite>毛毛小妖</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/FF34F311DDC43E2AF63BE897BCA24F05/100"><cite>NULL</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/59AA25A7627284AE62C8E6EBDC6FE417/100"><cite>吓一跳</cite></a></dd>
                                <dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/28B021E0F5AF0A4B9B781A24329FE897/100"><cite>如初</cite></a></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptsAfterJs')
  <script type="text/javascript">
        var page = 1;
        url = window.location.href;
        $(document).ready(function(){

            var category_id = url.split('category_id=')[1];
            if(category_id) {
                $("#category li[data-index='1']").removeClass();
                $("#category li[data-index='0']").attr("style", "top:"+ category_id*40 + "px");
                $("#category li[data-index='"+ category_id +"']").addClass('current');
            }

            $("#searchtxt").bind("input propertychange",function(event){
                $.ajax({
                    url: '/search',
                    type: "POST",
                    data: {
                        content : $("#searchtxt").val(),
                    },
                    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                }).done(function(data) {
                    if(data.html == "") {
                        return;
                    }

                    $(".search-result").css('display', 'block');
                    $(".search-result li").remove();
                    $(".search-result").append(data.html);
                }).fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('服务器未响应');
                });
            });

            if (/(iPhone|iPad|iPod|iOS|Android)/i.test(navigator.userAgent)) { //移动端
                $("#LAY_bloglist").append("<div class='layui-flow-more' id='more'><a onclick='loadAndoridData()'><cite>加载更多</cite></a></div>");
            } else {
                $(window).scroll(function() {
                    if($(window).scrollTop() + $(window).height() >= $(document).height() ) {
                        page++;
                        loadMoreData(page);
                    }
                });
            }
        });

        function loadMoreData(page) {
            url.indexOf('?') !== -1 ? url+="&page=" + page : url+="?page=" + page;

            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function() {
                    $('.ajax-load').show();
                }
            }).done(function(data) {
                if(data.html == "") {
                    return;
                }
                $('.ajax-load').hide();
                $("#LAY_bloglist").append(data.html);
                if(/(iPhone|iPad|iPod|iOS|Android)/i.test(navigator.userAgent)) { //移动端
                    if(!document.getElementById('nothing')) {
                        $("#LAY_bloglist").append("<div class='layui-flow-more' id='more'><a onclick='loadAndoridData()'><cite>加载更多</cite></a></div>");
                    }
                }
            }).fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('服务器未响应');
            });
        }

        function loadAndoridData() {
            page++;
            $("#more").remove();
            loadMoreData(page);
        }
    </script>
@endsection
