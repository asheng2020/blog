<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="www.yanshisan.cn" />
    <meta name="robots" content="all" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/static/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/layui/css/layui.css" />
    <link rel="stylesheet" href="/static/css/master.css" />
    <link rel="stylesheet" href="/static/css/gloable.css" />
    <link rel="stylesheet" href="/static/css/nprogress.css" />
    <link rel="stylesheet" href="/static/css/blog.css" />
    <link rel="stylesheet" href="/static/css/about.css" />
</head>
<body>
    <div class="header">
    </div>
    <header class="gird-header">
        <div class="header-fixed">
            <div class="header-inner">
                <a href="javascript:void(0)" class="header-logo" id="logo">Mr.Yss</a>
                <nav class="nav" id="nav">
                    <ul>
                        <li><a href="/index">首页</a></li>
                        <li><a href="/articles">博客</a></li>
                        <li><a href="/messages">留言</a></li>
                        <li><a href="/diaries">日记</a></li>
                        <li><a href="/links">友链</a></li>
                        <li><a href="/about">关于</a></li>
                    </ul>
                </nav>
                <a href="/User/QQLogin" class="blog-user">
                    <i class="fa fa-qq"></i>
                </a>
                <a class="phone-menu">
                    <i></i>
                    <i></i>
                    <i></i>
                </a>
            </div>
        </div>
    </header>

    @yield('content')


    <footer class="grid-footer">
        <div class="footer-fixed">
            <div class="copyright">
                <div class="info">
                    <div class="contact">
                        <a href="javascript:void(0)" class="github" target="_blank"><i class="fa fa-github"></i></a>
                        <a href="https://wpa.qq.com/msgrd?v=3&uin=930054439&site=qq&menu=yes" class="qq" target="_blank" title="930054439"><i class="fa fa-qq"></i></a>
                        <a href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=gbiysbG0tbWyuMHw8K-i7uw" class="email" target="_blank" title="930054439@qq.com"><i class="fa fa-envelope"></i></a>
                        <a href="javascript:void(0)" class="weixin"><i class="fa fa-weixin"></i></a>
                    </div>
                    <p class="mt05">
                        Copyright &copy; 2018-2018 燕十三 All Rights Reserved V.1.0.0 蜀ICP备18008600号
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="/static/layui/layui.js"></script>
    <script src="/static/js/yss/gloable.js"></script>
    <script src="/static/js/plugins/nprogress.js"></script>
    <script>NProgress.start();</script>
    <script src="/static/js/yss/article.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="/static/js/plugins/blogbenoitboucart.min.js"></script>
    <script src="/static/js/pagediary.js"></script>
    <script>
        window.onload = function () {
            NProgress.done();
        };
    </script>
    @yield('scriptsAfterJs')
</body>
</html>
