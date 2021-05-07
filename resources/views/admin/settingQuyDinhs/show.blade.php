@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.settingQuyDinh.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-quy-dinhs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.settingQuyDinh.fields.id') }}
                        </th>
                        <td>
                            {{ $settingQuyDinh->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingQuyDinh.fields.title') }}
                        </th>
                        <td>
                            {{ $settingQuyDinh->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingQuyDinh.fields.header') }}
                        </th>
                        <td>
                            {{ $settingQuyDinh->header }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingQuyDinh.fields.content') }}
                        </th>
                        <td>
                            {!! $settingQuyDinh->content !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-quy-dinhs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
