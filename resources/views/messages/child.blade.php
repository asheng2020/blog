@foreach($children as $child)
<div class="comment-child">
    <a name="reply-{{ $child->id }}"></a>
    <img src="{{ asset($child->user->avatar) }}">
    <div class="info">
        <span class="username">{{ $child->user->name }}</span>
        <span style="padding-right:0;margin-left:-5px;">回复</span>
        <span class="username">{{ $child->parent($child->comment_id)->user->name }}</span>
        <span>{!! $child->content !!}</span>
    </div>
    <p class="info">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <span>{{ $child->location }}</span>
        <span style="color:#a93838">{{ $child->browser }}</span>
        <span class="comment-time">{{ $child->created_at }}</span>
        <a href="javascript:;" class="btn-reply" data-targetid="{{ $child->id }}" data-targetname="{{ $child->user->name }}">回复</a>
    </p>
</div>


@if($child->children($child->id)->count() > 0)
@include('messages.child', ['children' => $child->children($child->id)])
@endif

@endforeach
