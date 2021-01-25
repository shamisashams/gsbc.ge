@extends('admin.layouts.app')
@section('content')
    <input name="old-images[]" id="old_images" hidden disabled value="{{$council->files}}">

    {!! Form::open(['url' => route('councilUpdate',[app()->getLocale(),$council->id]),'method' =>'put','files'=>true]) !!}
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                @lang('admin.create_council')
            </h6>
            <div class="element-box">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <div
                                        class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    {{ Form::label('first_name', __('admin.first_name_create'), []) }}
                                    {{ Form::text('first_name', (count($council->availableLanguage) > 0) ? $council->availableLanguage[0]->first_name : '', ['class' => 'form-control', 'no','placeholder'=>__('admin.enter_first_name')]) }}
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                    {{ $errors->first('first_name') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div
                                        class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    {{ Form::label('last_name', __('admin.last_name_create'), []) }}
                                    {{ Form::text('last_name', (count($council->availableLanguage) > 0) ? $council->availableLanguage[0]->last_name : '', ['class' => 'form-control', 'no','placeholder'=>__('admin.enter_last_name')]) }}
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                    {{ $errors->first('last_name') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div
                                        class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{ Form::label('email', __('admin.email_create'), []) }}
                                    {{ Form::email('email', $council->email, ['class' => 'form-control', 'no','placeholder'=>__('admin.enter_email')]) }}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div
                                        class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                    {{ Form::label('slug', __('admin.slug_create'), []) }}
                                    {{ Form::text('slug', $council->slug, ['class' => 'form-control', 'no','placeholder'=>__('admin.enter_slug')]) }}
                                    @if ($errors->has('slug'))
                                        <span class="help-block">
                                    {{ $errors->first('slug') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div
                                        class="form-group {{ $errors->has('position') ? ' has-error' : '' }}">
                                    {{ Form::label('position', __('admin.position_create'), []) }}
                                    {{ Form::text('position', (count($council->availableLanguage) > 0) ? $council->availableLanguage[0]->position : '', ['class' => 'form-control', 'no','placeholder'=>__('admin.enter_position')]) }}
                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                    {{ $errors->first('position') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div
                                        class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    {{ Form::label('phone', __('admin.phone_create'), []) }}
                                    {{ Form::text('phone', $council->phone, ['class' => 'form-control', 'no','placeholder'=>__('admin.enter_phone')]) }}
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                    {{ $errors->first('phone') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div
                                        class="form-group {{ $errors->has('biography') ? ' has-error' : '' }}">
                                    {{ Form::label('biography', __('admin.biography_create'), []) }}
                                    {{ Form::textarea('biography', (count($council->availableLanguage) > 0) ? $council->availableLanguage[0]->biography : '', ['id'=>'article-ckeditor','class' => 'form-control', 'no','placeholder'=>__('admin.enter_biography')]) }}
                                    @if ($errors->has('biography'))
                                        <span class="help-block">
                                    {{ $errors->first('biography') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        {{ Form::label('practical_areas[]',__('admin.practical_area_create') , []) }}
                        <select name="practical_areas[]" class="form-control select2" multiple="true">
                            @if(count($practicalAreas) > 0)
                                @foreach($practicalAreas as $practicalArea)
                                    <option value="{{$practicalArea->id}}" {{in_array($practicalArea->id,array_column($councilPracticalAreas,'id')) ? 'selected' : ''}}>{{(count($practicalArea->availableLanguage) > 0) ? $practicalArea->availableLanguage[0]->title : '' }}</option>
                                @endforeach
                            @endif
                        </select>
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

                <div class="row">
                    <div class="col-2">
                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> {{__('admin.update_button')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
