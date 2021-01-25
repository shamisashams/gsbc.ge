@extends('admin.layouts.app')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    {{ (count($council->availableLanguage) > 0) ? $council->availableLanguage[0]->first_name : ''}}
                </h6>

                <div class="row">
                    <div class="col-2">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>{{__('admin.first_name_create')}}</th>
                                <td>
                                    {{ (count($council->availableLanguage) > 0) ? $council->availableLanguage[0]->first_name : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('admin.last_name_create')}}</th>
                                <td>
                                    {{ (count($council->availableLanguage) > 0) ? $council->availableLanguage[0]->last_name : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('admin.position_create')}}</th>
                                <td>
                                    {{ (count($council->availableLanguage) > 0) ? $council->availableLanguage[0]->position : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('admin.slug_create')}}</th>
                                <td>
                                    {{ $council->slug }}
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('admin.email_create')}}</th>
                                <td>
                                    {{ $council->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('admin.phone_create')}}</th>
                                <td>
                                    {{ $council->phone }}
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('admin.practical_area_create')}}</th>
                                <td>
                                    @if(count($council->practicalAreas) > 0)
                                        @foreach($council->practicalAreas as $key => $area)
                                            @if($key == 0)
                                                {{count($area->availableLanguage) > 0 ? $area->availableLanguage[0]->title : ''}}
                                            @else
                                                , {{count($area->availableLanguage) > 0 ? $area->availableLanguage[0]->title : ''}}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="image-container">
                            @if(count($council->files) >0 )
                                @foreach($council->files as $file)
                                    <div class="view-image" style="background-image: url('{{url('storage/council/'.$file->fileable_id.'/'.$file->name)}}')"></div>
                                @endforeach
                            @endif
                        </div>
                    </div>
            </div>

@endsection
