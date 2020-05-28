@extends('layouts.other')
@section('title', '日记')

@section('content')
<link rel="stylesheet" href="/static/css/timeline.css" />
<div class="doc-container" id="doc-container">
     <div class="container-fixed">
        <div class="timeline-box shadow">
            <div class="timeline-main">
                <h1><i class="fa fa-clock-o"></i>日记</h1>
                <div class="timeline-line"></div>
                    <div class="timeline-year">
                        <h2><a class="yearToggle">2020 年</a><i class="fa fa-caret-down fa-fw"></i></h2>
                        <div class="timeline-month">
                            <ul>
                                @foreach($diaries as $diary)
                                <li>
                                    <div class="h4 animated fadeInLeft">
                                        <p class="date">{{ $diary->created_at->format("n年j日") }}</p>
                                    </div>
                                    <p class="dot-circle animated "><i class="fa fa-dot-circle-o"></i></p>
                                    <div class="content animated fadeInRight">{!! $diary->content !!}</div>
                                    <div class="clear"></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                <h1 style="padding-top:4px;padding-bottom:2px;margin-top:40px;"><i class="fa fa-hourglass-end"></i>THE END</h1>
            </div>
        </div>
    </div>
</div>
@endsection
