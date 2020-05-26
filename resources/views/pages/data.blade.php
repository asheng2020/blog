@foreach($articles as $article)
<section class="article-item zoomIn article">
    @if($article->is_top)
    <div class="fc-flag">置顶</div>
    @endif
    <h5 class="title">
        <span class="fc-blue">【原创】</span>
        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
    </h5>
    <div class="time">
        <span class="day">{{ $article->created_at->format('j') }}</span>
        <span class="month fs-18">{{ $article->created_at->format('n') }}<span class="fs-14">月</span></span>
        <span class="year fs-18 ml10">{{ $article->created_at->format('Y') }}</span>
    </div>
    <div class="content">
        <a href="{{ route('articles.show', $article->id) }}" class="cover img-light">
            <img style="background-image: url({{ $article->image_url }});background-position:center center;background-size: cover;">
<!--                            <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%">
                <image xlink:href='{{ $article->image_url }}' height="100%" width="100%"/>
            </svg> -->
        </a>
        {{ $article->description }}
    </div>
    <div class="read-more">
        <a href="{{ route('articles.show', $article->id) }}" class="fc-black f-fwb" style="margin-right: 8px;">阅读全文</a>
        <a href="{{ $article->image_url }}" target="_blank" class="fc-blue f-fwb">封面图</a>
    </div>
    <aside class="f-oh footer">
        <div class="f-fl tags">
            <span class="fa fa-tags fs-16"></span>
            <a class="tag">{{ $article->category->name }}</a>
        </div>
        <div class="f-fr">
            <span class="read">
                <i class="fa fa-eye fs-16"></i>
                <i class="num">{{ $article->read_count }}</i>
            </span>
            <span class="ml20">
                <i class="fa fa-comments fs-16"></i>
                <a href="javascript:void(0)" class="num fc-grey">{{ $article->comment_count }} </a>
                <a href="javascript:void(0)" class="num fc-grey">{{ $articles->count() }} </a>
            </span>
        </div>
    </aside>
</section>
@endforeach

@if($articles->currentPage() == $articles->lastPage() or $articles->count() < 16)
<div class='layui-flow-more' id='nothing'>没有更多了</div>
@endif
