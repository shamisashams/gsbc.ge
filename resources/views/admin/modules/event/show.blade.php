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
                                <th>{{__('admin.title_create')}}</th>
                                <td>
                                    {{ (count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->title : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('admin.description_create')}}</th>
                                <td>{{(count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->description : ''}}</td>
                            </tr>
                            <tr>
                                <th>{{__('admin.event_start_date')}}</th>
                                <td>{{date('d-M-Y H:i:s', strtotime($event->start_date))}}</td>
                            </tr>
                            <tr>
                                <th>{{__('admin.event_end_date')}}</th>
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
