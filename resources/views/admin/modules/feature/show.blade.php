@extends('admin.layouts.app')
@section('content')
    <div class="content-i">
        <div class="content-box"><div class="element-wrapper">
                <h6 class="element-header">
                    {{ (count($feature->availableLanguage) > 0) ? $feature->availableLanguage[0]->title : ''}}
                </h6>

                <div class="row">
                    <div class="col-2">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>Title</th>
                                <td>
                                    {{ (count($feature->availableLanguage) > 0) ? $feature->availableLanguage[0]->title : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td>{{$feature->position}}</td>
                            </tr>
                            <tr>
                                <th>slug</th>
                                <td>{{$feature->slug}}</td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{{$feature->type}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$feature->status ? 'True' : 'False'}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
    </div>

@endsection
