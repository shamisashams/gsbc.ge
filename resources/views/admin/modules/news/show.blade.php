@extends('admin.layouts.app')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    {{ (count($news->availableLanguage) > 0) ? $news->availableLanguage[0]->title : ''}}
                </h6>

                <div class="row">
                    <div class="col-6">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>Title</th>
                                <td>
                                    {{ (count($news->availableLanguage) > 0) ? $news->availableLanguage[0]->title : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{(count($news->availableLanguage) > 0) ? $news->availableLanguage[0]->description : ''}}</td>
                            </tr>
                            <tr>
                                <th>slug</th>
                                <td>{{$news->slug}}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{$news->category}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$news->status ? 'Active' : 'Not Active'}}</td>
                            </tr>
                            <tr>
                                <th>Body</th>
                                <td>{!! (count($news->availableLanguage) > 0) ? $news->availableLanguage[0]->body : ''!!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($news->files)
                    <div class="row">
                        <div class="col-6">
                            @foreach($news->files as $file)
                                <img width="250px" src="{{$file->path.'/'.$file->name}}">
                                <br>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>

@endsection
