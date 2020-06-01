@extends('layouts.other')
@section('title', '留言')

@section('content')
<div class="doc-container" id="doc-container">
    <div class="container-fixed">
        <div class="container-inner">
            <section class="msg-remark">
                <h1>留言板</h1>
                <p>
                    沟通交流，拉近你我！
                </p>
            </section>
            <div class="textarea-wrap message" id="textarea-wrap">
                <form class="layui-form blog-editor" action="{{ route('messages.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="layui-form-item">
                        <textarea name="content" lay-verify="content" id="remarkEditor" value="{{ old('content', $message->content) }}" placeholder="请输入内容" class="layui-textarea layui-hide"></textarea>
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn" lay-submit="formLeaveMessage" lay-filter="formLeaveMessage">提交留言</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- 输出后端报错开始 -->
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <h4>有错误发生：</h4>
            <ul>
              @foreach ($errors->all() as $error)
                <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <!-- 输出后端报错结束 -->
        <div class="f-cb"></div>
        <div class="mt20">
            <ul class="message-list" id="message-list">
                @include('messages.list', ['messages' => $messages])
            </ul>
        </div>
    </div>
</div>
@endsection
