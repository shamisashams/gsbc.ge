@extends('admin.layouts.app')
@section('content')
    {!! Form::open(['url' => route('adminEvent',app()->getLocale()),'method' =>'get']) !!}
    <div class="controls-above-table">
        <div class="row">
            <div class="col-sm-2">
                <a class="btn btn-lg btn-success" href="{{route('createEvent',app()->getLocale())}}">@lang('admin.create_event')</a>
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
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
            <tr>
                <th>
                    {{ Form::text('title',Request::get('title'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('title'))
                        <span class="help-block">
                        {{ $errors->first('title') }}
                        </span>
                    @endif
                </th>
                <th>
                    {{ Form::text('description',Request::get('description'),  ['class' => 'form-control', 'no','onChange' => 'this.form.submit()']) }}
                    @if ($errors->has('description'))
                        <span class="help-block">
                        {{ $errors->first('description') }}
                        </span>
                    @endif
                </th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            {!! Form::close() !!}
            <tbody>
            @if($events)
                @foreach($events as $event)
                    <tr>
                        <td class="text-center">{{(count($event->availableLanguage) > 0) ?  $event->availableLanguage[0]->title : ''}}</td>
                        <td class="text-center">{{(count($event->availableLanguage) > 0) ?  $event->availableLanguage[0]->description : ''}}</td>

                        <td class="text-center">{{date('d-M-Y H:i:s', strtotime($event->start_date))}}</td>
                        <td class="text-center">{{date('d-M-Y H:i:s', strtotime($event->end_date))}}</td>

                        <td class="row-actions d-flex">
                            <a href="{{route('showEvent',[app()->getLocale(),$event->id])}}">
                                <i class="os-icon os-icon-documents-07"></i>
                            </a>
                            <a href="{{route('editEvent', [app()->getLocale(), $event->id])}}">
                                <i class="os-icon os-icon-ui-49">

                                </i>
                            </a>
                            {!! Form::open(['url' => route('destroyEvent',[app()->getLocale(),$event->id]),'method' =>'delete']) !!}
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
    {{ $events->links('admin.vendor.pagination.custom') }}

@endsection
