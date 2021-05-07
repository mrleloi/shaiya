@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.settingGeneral.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-generals.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.id') }}
                        </th>
                        <td>
                            {{ $settingGeneral->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.title') }}
                        </th>
                        <td>
                            {{ $settingGeneral->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_ico') }}
                        </th>
                        <td>
                            @if($settingGeneral->url_ico)
                                <a href="{{ $settingGeneral->url_ico->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $settingGeneral->url_ico->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_logo') }}
                        </th>
                        <td>
                            @if($settingGeneral->url_logo)
                                <a href="{{ $settingGeneral->url_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $settingGeneral->url_logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_background') }}
                        </th>
                        <td>
                            @if($settingGeneral->url_background)
                                <a href="{{ $settingGeneral->url_background->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $settingGeneral->url_background->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_fanpage') }}
                        </th>
                        <td>
                            {{ $settingGeneral->url_fanpage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_group') }}
                        </th>
                        <td>
                            {{ $settingGeneral->url_group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.meta_des') }}
                        </th>
                        <td>
                            {{ $settingGeneral->meta_des }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.meta_keyword') }}
                        </th>
                        <td>
                            {{ $settingGeneral->meta_keyword }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-generals.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
