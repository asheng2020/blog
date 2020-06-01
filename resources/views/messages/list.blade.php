@foreach($messages as $message)
<li class="zoomIn article">
    <div class="comment-parent">
        <a name="remark-{{ $message->id }}"></a>
        <img src="https://thirdqq.qlogo.cn/qqapp/101465933/7627F745B95BFAC18C6C481FE72B4EB1/100" />
        <div class="info">
            <span class="username">{{ $message->user->name }}</span>
            <span style="color:#a93838">{{ $message->browser }}</span>
        </div>
        <div class="comment-content">
            {!! $message->content !!}
        </div>
        <p class="info info-footer">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>{{ $message->location }}</span>
            <span class="comment-time">{{ $message->created_at }}</span>
            <a href="javascript:;" class="btn-reply" data-targetid="{{ $message->id }}" data-targetname="{{ $message->user->name }}">回复</a>
        </p>
    </div>
    @if($message->children($message->id)->count() > 0)
    <hr />
    @endif
    @include('messages.child', ['children' => $message->children($message->id)])
    <div class="replycontainer layui-hide">
        <form class="layui-form" action="{{ route('messages.store') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="remarkId" value="1">
            <input type="hidden" name="targetUserId" value="0">
            @if(isset($article_id))
            <input type="hidden" name="article_id" value="{{ $article_id }}">
            @endif
            <div class="layui-form-item">
                <textarea name="content" lay-verify="replyContent" placeholder="请输入回复内容" class="layui-textarea" style="min-height:80px;"></textarea>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-xs" lay-submit="formReply" lay-filter="formReply">提交</button>
            </div>
        </form>
    </div>
</li>
@endforeach
