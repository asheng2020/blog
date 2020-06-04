@extends('layouts.other')
@section('title', '文章详情')

@section('css')
<link rel="stylesheet" href="/static/css/share.css" />
@endsection

@section('content')
<style type="text/css">
    img {
        max-width: 100%;
    }
</style>
<div class="doc-container" id="doc-container">
    <div class="container-fixed">
        <div class="col-content" style="width:100%">
            <div class="inner">
                <article class="article-list">
                    <input type="hidden" value="@Model.BlogTypeID" id="blogtypeid" />
                    <section class="article-item">
                        <aside class="title" style="line-height:1.5;">
                            <h4>{{ $article->title }}</h4>
                            <p class="fc-grey fs-14">
                                <small>
                                    作者：<a href="{{ route('about.index') }}" target="_blank" class="fc-link">榊寒子</a>
                                </small>
                                <small class="ml10">围观群众：<i class="readcount">{{ $article->read_count }}</i></small>
                                <small class="ml10">更新于 <label>{{ $article->updated_at }}</label> </small>
                            </p>
                        </aside>
                        <div class="time mt10" style="padding-bottom:0;">
                            <span class="day">{{ $article->created_at->format('j') }}</span>
                            <span class="month fs-18">{{ $article->created_at->format('n') }}<small class="fs-14">月</small></span>
                            <span class="year fs-18">{{ $article->created_at->format('Y') }}</span>
                        </div>
                        <div class="content artiledetail" style="border-bottom: 1px solid #e1e2e0; padding-bottom: 20px;">
                            {!! $article->content !!}
                            <div class="copyright mt20">
                                <p class="f-toe fc-black">
                                    非特殊说明，本文版权归 榊寒子 所有，转载请注明出处.
                                </p>
                                <p class="f-toe">
                                    本文标题：
                                    <a href="javascript:void(0)" class="r-title">{{ $article->title }}</a>
                                </p>
                                <p class="f-toe">
                                    本文网址：
                                    <a href="{{ route('articles.show', $article->id) }}">{{ Request::url() }}</a>
                                </p>
                            </div>
                            <div id="aplayer" style="margin:5px 0"></div>
                            <h6>随机阅读</h6>
                            <ol class="b-relation">
                                @foreach($recommends as $recommend)
                                <li class="f-toe"><a href="{{ route('articles.show', $recommend->id) }}">{{ $recommend->title }}</a></li>
                                @endforeach
                            </ol>
                        </div>
                        <div class="bdsharebuttonbox share bdshare-button-style0-32" data-tag="share_1" data-bd-bind="1591107087059">
                            <ul class="shareListStyle">
<!--                                 <li class="f-praise"><span><a class="s-praise"></a></span></li>
                                <li class="f-weinxi"><a class="s-weinxi" data-cmd="weixin" target="_blank"></a></li> -->
                                <li class="f-sina"><a href="http://service.weibo.com/share/share.php?url={{ route('articles.show', $article->id) }}&sharesource=weibo&title={{ $article->title }}&pic={{ $article->cover }}&appkey=3303384549" class="s-sina" data-cmd="tsina" target="_blank"></a></li>
                                <li class="f-qq" href="{{ route('articles.show', $article->id) }}" title="{{ $article->title }}" desc="{{ $article->description }}" cover="{{ $article->cover }}"><i class="fa fa-qq"></i></li>
                                <li class="f-qzone"><a href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url={{ route('articles.show', $article->id) }}&sharesource=qzone&title={{ $article->title }}&pics={{ $article->cover }}&summary={{ $article->description }}" class="s-qzone" data-cmd="qzone" target="_blank"></a></li>
                            </ul>
                        </div>
                        <div class="f-cb"></div>
                        <div class="mt20 f-fwn fs-24 fc-grey comment" style="border-top: 1px solid #e1e2e0; padding-top: 20px;">
                        </div>
                        <fieldset class="layui-elem-field layui-field-title">
                            <legend>发表评论</legend>
                            <div class="layui-field-box">
                                <div class="leavemessage" style="text-align:initial">
                                    <form class="layui-form blog-editor" action="{{ route('messages.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="article_id"  value="{{ $article->id }}">
                                        <div class="layui-form-item">
                                            <textarea name="content" lay-verify="content" id="remarkEditor" placeholder="请输入内容" class="layui-textarea layui-hide"></textarea>
                                        </div>
                                        <div class="layui-form-item">
                                            <button class="layui-btn" lay-submit="formLeaveMessage" lay-filter="formLeaveMessage">提交留言</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </fieldset>
                        <ul class="message-list" id="message-list">
                            @include('messages.list', ['messages' => $messages, 'article_id' => $article->id])
                        </ul>
                    </section>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptsAfterJs')
<script src="/static/js/MessagesAjax.js"></script>
@endsection
