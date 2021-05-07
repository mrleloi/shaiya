@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.settingHuongDan.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-huong-dans.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.settingHuongDan.fields.id') }}
                        </th>
                        <td>
                            {{ $settingHuongDan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingHuongDan.fields.title') }}
                        </th>
                        <td>
                            {{ $settingHuongDan->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingHuongDan.fields.header') }}
                        </th>
                        <td>
                            {{ $settingHuongDan->header }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingHuongDan.fields.content') }}
                        </th>
                        <td>
                            {!! $settingHuongDan->content !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-huong-dans.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
