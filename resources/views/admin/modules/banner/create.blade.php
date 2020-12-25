@extends('admin.layouts.app')
@section('content')
    {!! Form::open(['url' => route('saveBanner',app()->getLocale()),'method' =>'post','files'=>true]) !!}
    <div class="content-box">
        <div class="row">
            <div class="col-lg-6">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        @lang('admin.create_banner')
                    </h6>
                    <div class="element-box">
                        <div class="row">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('header') ? ' has-error' : '' }}">
                                    {{ Form::label('header', 'Header 1', []) }}
                                    {{ Form::text('header', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Header']) }}
                                    @if ($errors->has('header'))
                                        <span class="help-block">
                                    {{ $errors->first('header') }}
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
                                    {{ Form::label('text', 'Text 1', []) }}
                                    {{ Form::text('text', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Text']) }}
                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                            {{ $errors->first('text') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('header_1') ? ' has-error' : '' }}">
                                    {{ Form::label('header_1', 'Header 2', []) }}
                                    {{ Form::text('header_1', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Header']) }}
                                    @if ($errors->has('header_1'))
                                        <span class="help-block">
                                    {{ $errors->first('header_1') }}
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('text_1') ? ' has-error' : '' }}">
                                    {{ Form::label('text_1', 'Text 2', []) }}
                                    {{ Form::text('text_1', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Text']) }}
                                    @if ($errors->has('text_1'))
                                        <span class="help-block">
                                            {{ $errors->first('text_1') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('header_2') ? ' has-error' : '' }}">
                                    {{ Form::label('header_2', 'Header 3', []) }}
                                    {{ Form::text('header_2', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Header']) }}
                                    @if ($errors->has('header_2'))
                                        <span class="help-block">
                                    {{ $errors->first('header_2') }}
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('text_2') ? ' has-error' : '' }}">
                                    {{ Form::label('text_2', 'Text 3', []) }}
                                    {{ Form::text('text_2', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Text']) }}
                                    @if ($errors->has('text_2'))
                                        <span class="help-block">
                                            {{ $errors->first('text_2') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('header_3') ? ' has-error' : '' }}">
                                    {{ Form::label('header_3', 'Header 4', []) }}
                                    {{ Form::text('header_3', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Header']) }}
                                    @if ($errors->has('header_3'))
                                        <span class="help-block">
                                    {{ $errors->first('header_3') }}
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('text_3') ? ' has-error' : '' }}">
                                    {{ Form::label('text_3', 'Text 4', []) }}
                                    {{ Form::text('text_3', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Text']) }}
                                    @if ($errors->has('text_3'))
                                        <span class="help-block">
                                            {{ $errors->first('text_3') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" name="status"
                                                                   type="checkbox">Status</label>
                        </div>

                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Create</button>
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
