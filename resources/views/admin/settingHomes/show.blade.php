@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.settingHome.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-homes.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.settingHome.fields.id') }}
                        </th>
                        <td>
                            {{ $settingHome->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingHome.fields.title') }}
                        </th>
                        <td>
                            {{ $settingHome->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingHome.fields.num_news_display') }}
                        </th>
                        <td>
                            {{ $settingHome->num_news_display }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingHome.fields.num_events_display') }}
                        </th>
                        <td>
                            {{ $settingHome->num_events_display }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-homes.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
