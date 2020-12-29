@extends('admin.layouts.app')
@section('content')
    {!! Form::open(['url' => route('news',app()->getLocale()),'method' =>'get']) !!}
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
                <th>{{__('admin.title')}}</th>
                <th>{{__('admin.slug')}}</th>
                <th>{{__('admin.type')}}</th>
                <th>{{__('admin.status')}}</th>
                <th>{{__('admin.actions')}}</th>
            </tr>
            <tr>
            </tr>
            </thead>
            {!! Form::close() !!}
            <tbody>
            @if($pages)
                @foreach($pages as $page)
                    <tr>
                        <td class="text-center">{{(count($page->availableLanguage) > 0) ?  $page->availableLanguage[0]->title : ''}}</td>
                        <td class="text-center">{{$page->slug}}</td>
                        <td class="text-center">{{$page->type}}</td>
                        <td class="text-center">
                            @if($page->status)
                                <span class="text-green">{{__('admin.active')}}</span>
                            @else
                                <span class="text-red">{{__('admin.not_active')}}</span>
                            @endif
                        </td>
                        <td class="row-actions d-flex">
                            <a href="{{route('editHome', [app()->getLocale(), $page->id])}}">
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
{{--    {{ $news->links('admin.vendor.pagination.custom') }}--}}

@endsection
