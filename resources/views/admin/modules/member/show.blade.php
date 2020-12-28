@extends('admin.layouts.app')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    {{ (count($member->availableLanguage) > 0) ? $member->availableLanguage[0]->title : ''}}
                </h6>

                <div class="row">
                    <div class="col-6">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>Title</th>
                                <td>
                                    {{ (count($member->availableLanguage) > 0) ? $member->availableLanguage[0]->title : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{(count($member->availableLanguage) > 0) ? $member->availableLanguage[0]->description : ''}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$member->status ? 'True' : 'False'}}</td>
                            </tr>
                            <tr>
                                <th>Body</th>
                                <td>{!! (count($member->availableLanguage) > 0) ? $member->availableLanguage[0]->body : ''!!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($member->files)
                    <div class="row">
                        <div class="col-6">
                            @foreach($member->files as $file)
                                <img width="250px" src="{{$file->path.'/'.$file->name}}">
                                <br>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>

@endsection
