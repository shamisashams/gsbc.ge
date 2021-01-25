@extends('admin.layouts.app')
@section('content')
    {!! Form::open(['url' => route('councilIndex',app()->getLocale()),'method' =>'get']) !!}
    <div class="controls-above-table">
        <div class="row">
            <div class="col-sm-2">
                <a class="btn btn-lg btn-success" href="{{route('councilCreateView',app()->getLocale())}}">@lang('admin.create_council')</a>
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
                <th>ID</th>
                <th>{{__('admin.first_name')}}</th>
                <th>{{__('admin.last_name')}}</th>
                <th>{{__('admin.position')}}</th>
                <th>{{__('admin.actions')}}</th>
            </tr>
            <tr>
                <th>
                    {{ Form::text('id',Request::get('id'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('id'))
                        <span class="help-block">
                        {{ $errors->first('id') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('first_name',Request::get('first_name'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                        {{ $errors->first('first_name') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('last_name',Request::get('last_name'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                        {{ $errors->first('last_name') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('position',Request::get('position'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('position'))
                        <span class="help-block">
                        {{ $errors->first('position') }}
                        </span>
                    @endif
                </th>
                <th></th>
            </tr>
            </thead>
            {!! Form::close() !!}
            <tbody>
            @if($councils)
                @foreach($councils as $council)
                    <tr>
                        <td class="text-left">{{$council->id}}</td>
                        <td class="text-center">{{(count($council->availableLanguage) > 0) ?  $council->availableLanguage[0]->first_name : ''}}</td>
                        <td class="text-center">{{(count($council->availableLanguage) > 0) ?  $council->availableLanguage[0]->last_name : ''}}</td>
                        <td class="text-center">{{(count($council->availableLanguage) > 0) ?  $council->availableLanguage[0]->position : ''}}</td>
                        <td class="row-actions d-flex">
                            <a href="{{route('councilShow',[app()->getLocale(),$council->id])}}">
                                <i class="os-icon os-icon-documents-07"></i>
                            </a>
                            <a href="{{route('councilEditView',[app()->getLocale(), $council->id])}}">
                                <i class="os-icon os-icon-ui-49">

                                </i>
                            </a>
                            {!! Form::open(['url' => route('councilDestroy',[app()->getLocale(),$council->id]),'method' =>'delete']) !!}
                                <button class="delete-icon" onclick="return confirm('Are you sure, you want to delete this item?!');" type="submit">
                                    <i
                                        class="os-icon os-icon-ui-15">
                                    </i>
                                </button>
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    {{ $councils->links('admin.vendor.pagination.custom') }}

@endsection
