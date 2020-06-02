@extends('layouts.other')
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
                            @foreach($visitors as $visitor)
                            <dd><a href="javasript:;"><img src="{{ asset($visitor->avatar) }}"><cite>{{ $visitor->name }}</cite></a></dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptsAfterJs')
<script src="/static/js/ArticlesAjax.js"></script>
@endsection
