@extends('admin.layouts.app')
@section('content')
<div class="content-box">
    <div class="row">
        <div class="col-lg-6">
            <div class="element-wrapper">
                <h6 class="element-header">
                    @lang('admin.setting_create')
                </h6>
                    <div class="element-box">
                        {!! Form::open(['url' => route('settingCreate',app()->getLocale()),'method' =>'post']) !!}
                        <div class="row">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('key') ? ' has-error' : '' }}">
                                    {{ Form::label('key', __('admin.title'), []) }}
                                    {{ Form::text('key', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Key']) }}
                                    @if ($errors->has('key'))
                                        <span class="help-block">
                                    {{ $errors->first('key') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('value') ? ' has-error' : '' }}">
                                    {{ Form::label('value', 'Value', []) }}
                                    {{ Form::text('value', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Value']) }}
                                    @if ($errors->has('value'))
                                        <span class="help-block">
                                            {{ $errors->first('value') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Create</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
