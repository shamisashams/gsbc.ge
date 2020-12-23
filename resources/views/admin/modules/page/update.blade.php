@extends('admin.layouts.app')
@section('content')
    <input name="old-images[]" id="old_images" hidden disabled value="{{$page->files}}">

    {!! Form::open(['url' => route('updateHome',[app()->getLocale(),$page->id]),'method' =>'put','files'=>true]) !!}
    <div class="content-box">
        <div class="row">
            <div class="col-lg-6">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        @lang('admin.page_update')
                    </h6>
                    <div class="element-box">
                        <div class="row">
                            <div class="col-6">
                                <div
                                    class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    {{ Form::label('title', 'Title', []) }}
                                    {{ Form::text('title', (count($page->availableLanguage) > 0) ? $page->availableLanguage[0]->title : '', ['class' => 'form-control', 'no','placeholder'=>'Enter Title']) }}
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                    {{ $errors->first('title') }}
                                </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                    {{ Form::label('body', 'Body', []) }}
                                    {{ Form::textarea('body', (count($page->availableLanguage) > 0) ? $page->availableLanguage[0]->body : '',
                                     ['class' => 'form-control', 'no','placeholder'=>'Enter Slug']) }}
                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                    {{ $errors->first('body') }}
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input"
                                                                   {{$page->status ? 'checked' : ''}} name="status"
                                                                   type="checkbox">Status</label>
                        </div>
                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Update</button>
                        </div>

                    </div>
                </div>
            </div>
            @if($page->type!=="welcome")
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
            @endif
        </div>
    </div>
    {!! Form::close() !!}



@endsection
