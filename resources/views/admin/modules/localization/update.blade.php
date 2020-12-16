@extends('admin.layouts.app')
@section('content')
    <div class="content-box">
        <div class="row">
            <div class="col-lg-6">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Localization update
                    </h6>
                    <div class="element-box">
                        {!! Form::open(['url' => route('localizationUpdate',[app()->getLocale(),$localization->id]),'method' =>'put']) !!}
                        <div class="row">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    {{ Form::label('title', 'Title', []) }}
                                    {{ Form::text('title', $localization->title, ['class' => 'form-control', 'no','placeholder'=>'Enter Title']) }}
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
                                    {{ Form::label('abbreviation', 'Title', []) }}
                                    {{ Form::text('abbreviation', $localization->abbreviation, ['class' => 'form-control', 'no','placeholder'=>'Enter Abbreviation']) }}
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
                                    {{ Form::text('native', $localization->native, ['class' => 'form-control', 'no','placeholder'=>'Enter Native']) }}
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
                                    {{ Form::label('locale', $localization->locale, []) }}
                                    {{ Form::text('locale', $localization->locale, ['class' => 'form-control', 'no','placeholder'=>'Enter Locale']) }}
                                    @if ($errors->has('locale'))
                                        <span class="help-block">
                                            {{ $errors->first('locale') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" {{$localization->status ? 'checked' : '' }} name="status"
                                                                   type="checkbox">Status</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" name="default" {{$localization->default ? 'checked' : '' }}
                                                                   type="checkbox">Default</label>
                        </div>
                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Update</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
