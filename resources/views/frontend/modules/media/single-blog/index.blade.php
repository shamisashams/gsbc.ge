@extends('frontend.layouts.layout')
@section('content')
    <section class="showcase-short">
        <div class="overlay"></div>
    </section>

        <section class="single-blog">
            <div class="wrapper">
                @if($news)
                <div class="heading">
                    <p class="small">{{date('M d / Y', strtotime($news->created_at))}}</p>
                    <h5 class="large">{{(count($news->availableLanguage) > 0) ?  $news->availableLanguage[0]->title : ''}}</h5>
                </div>
                <div class="content">
                    <div class="first-img">
                        <img src="{{$news->files[0]->path.'/'.$news->files[0]->name}}">
                    </div>
                    {!!(count($news->availableLanguage) > 0) ?  $news->availableLanguage[0]->body : ''!!}
                </div>
                @endif
            </div>
        </section>
@endsection
