@extends('admin.layouts.app')
@section('content')
    <input name="old-images[]" id="old_images" hidden disabled value="{{$banner->files}}">

    {!! Form::open(['url' => route('updateBanner',[app()->getLocale(),$banner->id]),'method' =>'put','files'=>true]) !!}
    <div class="content-box">
        <div class="row">
            <div class="col-lg-6">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        @lang('admin.banner_update')
                    </h6>
                    <div class="element-box">

                        <div class="row">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('header') ? ' has-error' : '' }}">
                                    {{ Form::label('header', __('admin.header'), []) }}
                                    {{ Form::text('header',  (count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header : '', ['class' => 'form-control', 'no','placeholder'=> __('admin.enter_header')]) }}
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
                                    {{ Form::label('text', __('admin.text1'), []) }}
                                    {{ Form::text('text', (count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->text : '', ['class' => 'form-control', 'no','placeholder'=> __('admin.enter_text')]) }}
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
                                    {{ Form::label('header_1',  __('admin.header1'), []) }}
                                    {{ Form::text('header_1', (count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header_1 : '', ['class' => 'form-control', 'no','placeholder'=> __('admin.enter_header1')]) }}
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
                                    {{ Form::label('text_1',  __('admin.text1'), []) }}
                                    {{ Form::text('text_1', (count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->text_1 : '', ['class' => 'form-control', 'no','placeholder'=> __('admin.enter_text1')]) }}
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
                                    {{ Form::label('header_2',  __('admin.header2'), []) }}
                                    {{ Form::text('header_2', (count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header_2 : '', ['class' => 'form-control', 'no','placeholder'=> __('admin.enter_header2')]) }}
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
                                    {{ Form::label('text_2',  __('admin.text2'), []) }}
                                    {{ Form::text('text_2', (count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->text_2 : '', ['class' => 'form-control', 'no','placeholder'=> __('admin.enter_text2')]) }}
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
                                    {{ Form::label('header_3',  __('admin.header3'), []) }}
                                    {{ Form::text('header_3', (count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header_3 : '', ['class' => 'form-control', 'no','placeholder'=> __('admin.enter_header3')]) }}
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
                                    {{ Form::label('text_3',  __('admin.text3'), []) }}
                                    {{ Form::text('text_3', (count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->text_3 : '', ['class' => 'form-control', 'no','placeholder'=> __('admin.enter_text3')]) }}
                                    @if ($errors->has('text_3'))
                                        <span class="help-block">
                                            {{ $errors->first('text_3') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input"
                                                                   {{$banner->status ? 'checked' : ''}} name="status"
                                                                   type="checkbox"> {{__('admin.status_create')}}</label>
                        </div>
                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit">{{__('admin.update_button')}}</button>
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
