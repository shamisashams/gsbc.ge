@extends('admin.layouts.app')
@section('content')
    <input name="old-images[]" id="old_images" hidden disabled value="{{$event->files}}">

    {!! Form::open(['url' => route('updateEvent',[app()->getLocale(),$event->id]),'method' =>'put','files'=>true]) !!}
    <div class="content-box">
        <div class="row">
            <div class="col-lg-6">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        @lang('admin.event_update')
                    </h6>
                    <div class="element-box">
                        <div class="row">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    {{ Form::label('title', 'Title', []) }}
                                    {{ Form::text('title', (count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->title : '', ['class' => 'form-control', 'no','placeholder'=>'Enter Title']) }}
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                    {{ $errors->first('title') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                    {{ Form::label('description', 'Description', []) }}
                                    {{ Form::text('description', (count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->description : '', ['class' => 'form-control', 'no','placeholder'=>'Enter Position']) }}
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            {{ $errors->first('description') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="event_date">{{__('admin.event_start_date')}}</label>
                                <input class="form-control" id="end_date" name="start_date" type="datetime-local"
                                       value="{{$startDate}}">
                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                            {{ $errors->first('start_date') }}
                                        </span>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="event_date">{{__('admin.event_end_date')}}</label>
                                <input class="form-control" id="end_date" name="end_date" type="datetime-local"
                                       value="{{$endDate}}">
                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                            {{ $errors->first('end_date') }}
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top:18px">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
                                    {{ Form::label('location', __('admin.location'), []) }}
                                    {{ Form::text('location',(count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->location : '', ['class' => 'form-control', 'no','placeholder'=>'Enter Location']) }}
                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                    {{ $errors->first('location') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Update</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="element-wrapper">
                    <h6 class="element-header" style="padding-top: 16px;">
                    </h6>
                    <div class="element-box">
                        <div class="form-group">
                            <div class="input-images"></div>
                            @if ($errors->has('images'))
                                <span class="help-block">
                                            {{ $errors->first('images') }}
                                        </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}

@endsection
