@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.postNew.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.post-news.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.postNew.fields.id') }}
                        </th>
                        <td>
                            {{ $postNew->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postNew.fields.icon_url') }}
                        </th>
                        <td>
                            @if($postNew->icon_url)
                                <a href="{{ $postNew->icon_url->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $postNew->icon_url->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postNew.fields.title') }}
                        </th>
                        <td>
                            {{ $postNew->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postNew.fields.content') }}
                        </th>
                        <td>
                            {!! $postNew->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postNew.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $postNew->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.post-news.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection