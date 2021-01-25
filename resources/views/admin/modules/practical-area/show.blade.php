@extends('admin.layouts.app')
@section('content')
    <div class="content-i">
        <div class="content-box"><div class="element-wrapper">
                <h6 class="element-header">
                    {{ (count($practicalArea->availableLanguage) > 0) ? $practicalArea->availableLanguage[0]->title : ''}}
                </h6>

                <div class="row">
                    <div class="col-2">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>{{__('admin.title_create')}}</th>
                                <td>
                                    {{ (count($practicalArea->availableLanguage) > 0) ? $practicalArea->availableLanguage[0]->title : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('admin.description_create')}}</th>
                                <td>
                                    {{ (count($practicalArea->availableLanguage) > 0) ? $practicalArea->availableLanguage[0]->description : ''}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>

@endsection
