@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.postEvent.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.post-events.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.postEvent.fields.id') }}
                        </th>
                        <td>
                            {{ $postEvent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postEvent.fields.icon_url') }}
                        </th>
                        <td>
                            @if($postEvent->icon_url)
                                <a href="{{ $postEvent->icon_url->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $postEvent->icon_url->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postEvent.fields.title') }}
                        </th>
                        <td>
                            {{ $postEvent->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postEvent.fields.content') }}
                        </th>
                        <td>
                            {!! $postEvent->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postEvent.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $postEvent->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.post-events.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
