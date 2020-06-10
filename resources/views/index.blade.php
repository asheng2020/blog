<!DOCTYPE html>
<html lang="zh-Hans-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width" />
    <title>榊寒子-一个肥宅的日常分享</title>
    <meta name="keywords" content="laravel，技术，沙雕，动漫，美图，搞笑">
    <meta name="description" content="分享我的日常，有沙雕，有搞笑，有干货，有美图，有软件，分享一切我所知，独乐乐不如众乐乐">
    <link href="/static/layui/css/layui.css" rel="stylesheet" type="text/css">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/static/css/index_style.css" rel="stylesheet" type="text/css">
    <link href="/static/css/animate.min.css" rel="stylesheet" type="text/css">
    <link rel="ICON" href="/logo.png">
    <link rel="SHORTCUT ICON" href="/logo.png">
</head>
<body>
    <div id="menu" class="hover_animation menu_open" data-mark="false">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div id="navgation" class="navgation navgation_close">
        <ul class="point">
            <li><a href="">首页</a></li>
            <li><a href="/articles">博客</a></li>
            <li><a href="/messages">留言</a></li>
            <li><a href="/diaries">日记</a></li>
            <li><a href="/links">友链</a></li>
            <li><a href="/about">关于</a></li>
        </ul>
        <div class="logo"><a>Mr.Shen</a></div>
    </div>
    <div class="section" id="section1">
        <div class="fp-tablecell">
            <div class="page1">
                <div class="nav wow zoomIn" data-wow-duration="2s">
                    <h1>榊 寒 子</h1>
                    <p>宝剑锋从磨砺出 梅花香自苦寒来</p>
                    <a class="layui-btn layui-btn-normal" style="margin-top: 20px" href="/articles">开启我们的故事</a>
                </div>
                <a class="next wow fadeInUp" data-wow-duration="2s" id="next"></a>
            </div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="fp-tablecell">
            <div class="page2">
                <div class="warp-box">
                    <div class="new-article">
                        <div class="inner wow fadeInDown" data-wow-delay=".2s">
                            <h1>热门文章</h1>
                            <p>
                                现在经历的磨难总会在未来变换成幸福
                                <br>享受生活一步一步变好的过程
                            </p>
                        </div>
                    </div>
                    <div class="layui-row">
                        @foreach($articles as $key => $article)
                        <div class="layui-col-xs12 layui-col-sm4 layui-col-md4  wow fadeInUp" data-wow-delay=".{{ $key*2 }}s" style="padding: 0 10px">
                            <div class="single-news">
                                <div class="news-head">
                                    <img style="background-image: url({{ asset($article->cover) }});background-position:center center;background-size: cover;">
                                    <a href="{{ route('articles.show', $article->id) }}" class="link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="news-content">
                                    <h4>
                                        <a href="{{ route('articles.show', $article->id) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h4>
                                    <div class="date">
                                        {{ $article->created_at->format('Y年n月j日') }}
                                    </div>
                                    <p>
                                        {{ $article->description }}
                                    </p>
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn">
                                        阅读全文
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section3">
        <div class="fp-tablecell">
            <div class="page3">
                <div class="warp-box">
                    <div class="warp">
                        <div class="inner">
                            <div class="links">
                                <ul>
                                    <li class="wow fadeInLeft"><a href="/about">关于</a></li>
                                    <li class="wow fadeInRight"><a href="/links">+友情链接</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section4">
        <div class="fp-tablecell">
            <div class="page4">
                <div class="warp-box">
                    <div class="about">
                        <div class="inner">
                            <h1 class="wow fadeInLeft">次元使者</h1>
                            <p class="wow fadeInRight">
                                曾经向往在宫崎骏的动漫世界里遨游，现在迷茫于现实的琐碎不知远方何在
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer wow fadeInUp" id="contact">
        <div class="footer-top">
            <div class="container">
                <div class="layui-row">
                    <div class="layui-col-xs12 layui-col-sm6 layui-col-md4">
                        <div class="single-widget about">
                            <div class="footer-logo">
                                <h2>榊寒子</h2>
                            </div>
                            <p>宝剑锋从磨砺出 梅花香自苦寒来</p>
                            <div class="button">
                                <a href="/about" class="btn layui-btn layui-btn-normal">About Me</a>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs12 layui-col-sm6 layui-col-md4">
                        <div class="single-widget">
                            <h2>相关链接</h2>
                            <ul class="social-icon">
                                <li class="active"><a href="/articles"><i class="fa fa-book"></i>博文</a></li>
                                <li class="active"><a href="/messages"><i class="fa fa-comments"></i>留言</a></li>
                                <!-- <li class="active"><a href="#"><i class="fa fa-share"></i>资源</a></li> -->
                                <li class="active"><a href="/diaries"><i class="fa fa-snowflake-o"></i>日记</a></li>
                                <!-- <li class="active"><a href="#"><i class="fa fa-files-o"></i>归档</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="layui-col-xs12 layui-col-sm12 layui-col-md4">
                        <div class="single-widget contact">
                            <h2>联系我</h2>
                            <ul class="list">
                                <li><i class="fa fa-map"></i>地址: 念之所想触手可及</li>
                                <li><i class="fa fa-qq"></i>QQ: 1683972097 </li>
                                <li><i class="fa fa-envelope"></i>邮箱: 1683972097@qq.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="layui-row">
                    <div class="layui-col-xs12 layui-col-sm12 layui-col-md12 text-center">
                        <p>Copyright &copy; 2020-未来 榊寒子 All Rights Reserved V.3.1.3 </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/static/layui/layui.js"></script>
    <script src="/static/js/wow.min.js"></script>
    <script src="/static/js/index.js"></script>
</body>
</html>
