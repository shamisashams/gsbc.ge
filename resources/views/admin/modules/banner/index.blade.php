@extends('admin.layouts.app')
@section('content')
    {!! Form::open(['url' => route('banner',app()->getLocale()),'method' =>'get']) !!}
    <div class="controls-above-table">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10 per-page-column">
                <div class="per-page-container">
                    {{ Form::select('per_page',[10 => 10,20 => 20,30 => 30,50 => 50,100=>100],(Request::get('per_page') != null ? Request::get('per_page') : 10),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-lg table-v2 table-striped">
            <thead>
            <tr>
                <th>{{__('admin.header')}}</th>
                <th>{{__('admin.header1')}}</th>
                <th>{{__('admin.header2')}}</th>
                <th>{{__('admin.header3')}}</th>
                <th>{{__('admin.text')}}</th>
                <th>{{__('admin.text1')}}</th>
                <th>{{__('admin.text2')}}</th>
                <th>{{__('admin.text3')}}</th>
                <th>{{__('admin.actions')}}</th>
            </tr>
            <tr>
                <th>
                    {{ Form::text('header',Request::get('header'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('header'))
                        <span class="help-block">
                        {{ $errors->first('header') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('header_1',Request::get('header_1'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('header_1'))
                        <span class="help-block">
                        {{ $errors->first('header_1') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('header_2',Request::get('header_2'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('header_2'))
                        <span class="help-block">
                        {{ $errors->first('header_2') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('header_3',Request::get('header_3'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('header_3'))
                        <span class="help-block">
                        {{ $errors->first('header_3') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('text',Request::get('text'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('text'))
                        <span class="help-block">
                        {{ $errors->first('text') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('text_1',Request::get('text_1'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('text_1'))
                        <span class="help-block">
                        {{ $errors->first('text_1') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('text_2',Request::get('text_2'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('text_2'))
                        <span class="help-block">
                        {{ $errors->first('text_2') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('text_3',Request::get('text_3'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('text_3'))
                        <span class="help-block">
                        {{ $errors->first('text_3') }}
                        </span>
                    @endif
                </th>
                <th></th>
            </tr>
            </thead>
            {!! Form::close() !!}
            <tbody>
            @if($banners)
                @foreach($banners as $banner)
                    <tr>
                        <td class="text-center">{{(count($banner->availableLanguage) > 0) ?  $banner->availableLanguage[0]->header : ''}}</td>
                        <td class="text-center">{{(count($banner->availableLanguage) > 0) ?  $banner->availableLanguage[0]->header_1 : ''}}</td>
                        <td class="text-center">{{(count($banner->availableLanguage) > 0) ?  $banner->availableLanguage[0]->header_2 : ''}}</td>
                        <td class="text-center">{{(count($banner->availableLanguage) > 0) ?  $banner->availableLanguage[0]->header_3 : ''}}</td>
                        <td class="text-center">{{(count($banner->availableLanguage) > 0) ?  $banner->availableLanguage[0]->text : ''}}</td>
                        <td class="text-center">{{(count($banner->availableLanguage) > 0) ?  $banner->availableLanguage[0]->text_1 : ''}}</td>
                        <td class="text-center">{{(count($banner->availableLanguage) > 0) ?  $banner->availableLanguage[0]->text_2 : ''}}</td>
                        <td class="text-center">{{(count($banner->availableLanguage) > 0) ?  $banner->availableLanguage[0]->text_3 : ''}}</td>


                        <td class="row-actions d-flex">
                            <a href="{{route('editBanner', [app()->getLocale(), $banner->id])}}">
                                <i class="os-icon os-icon-ui-49">

                                </i>
                            </a>

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    {{ $banners->links('admin.vendor.pagination.custom') }}

@endsection
