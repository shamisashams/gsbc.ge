@extends('admin.layouts.app')
@section('content')
    <div class="content-box">
        <div class="row">
            <div class="col-lg-6">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Localization Create
                    </h6>
                    <div class="element-box">
                        {!! Form::open(['url' => route('localizationCreate',app()->getLocale()),'method' =>'post']) !!}
                        <div class="row">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    {{ Form::label('title', 'Title', []) }}
                                    {{ Form::text('title', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Title']) }}
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                    {{ $errors->first('title') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('abbreviation') ? ' has-error' : '' }}">
                                    {{ Form::label('abbreviation', 'Abbreviation', []) }}
                                    {{ Form::text('abbreviation', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Abbreviation']) }}
                                    @if ($errors->has('abbreviation'))
                                        <span class="help-block">
                                            {{ $errors->first('abbreviation') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('native') ? ' has-error' : '' }}">
                                    {{ Form::label('native', 'Native', []) }}
                                    {{ Form::text('native', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Native']) }}
                                    @if ($errors->has('native'))
                                        <span class="help-block">
                                    {{ $errors->first('native') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('locale') ? ' has-error' : '' }}">
                                    {{ Form::label('locale', 'locale', []) }}
                                    {{ Form::text('locale', '', ['class' => 'form-control', 'no','placeholder'=>'Enter Locale']) }}
                                    @if ($errors->has('locale'))
                                        <span class="help-block">
                                            {{ $errors->first('locale') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" name="status"
                                                                   type="checkbox">Status</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" name="default"
                                                                   type="checkbox">Default</label>
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
