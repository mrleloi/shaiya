@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.settingServerInfo.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-server-infos.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.settingServerInfo.fields.id') }}
                        </th>
                        <td>
                            {{ $settingServerInfo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingServerInfo.fields.title') }}
                        </th>
                        <td>
                            {{ $settingServerInfo->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingServerInfo.fields.header') }}
                        </th>
                        <td>
                            {{ $settingServerInfo->header }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingServerInfo.fields.content') }}
                        </th>
                        <td>
                            {!! $settingServerInfo->content !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-server-infos.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
