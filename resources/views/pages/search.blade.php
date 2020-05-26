@foreach($articles as $article)
<li class="child"><a href="{{ route('articles.show', $article->id) }}" style="display:block">{!! str_replace($search, "<b style='color:#6bc30d'>".$search.'</b>', $article->title) !!}</a></li>
@endforeach
