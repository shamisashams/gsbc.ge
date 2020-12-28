@extends('admin.layouts.app')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    {{ (count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->title : ''}}
                </h6>

                <div class="row">
                    <div class="col-6">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>Title</th>
                                <td>
                                    {{ (count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->title : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{(count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->description : ''}}</td>
                            </tr>
                            <tr>
                                <th>Start Date</th>
                                <td>{{date('d-M-Y H:i:s', strtotime($event->start_date))}}</td>
                            </tr>
                            <tr>
                                <th>End Date</th>
                                <td>{{date('d-M-Y H:i:s', strtotime($event->end_date))}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($event->files)
                    <div class="row">
                        <div class="col-6">
                            @foreach($event->files as $file)
                                <img width="250px" src="{{$file->path.'/'.$file->name}}">
                                <br>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>

@endsection
