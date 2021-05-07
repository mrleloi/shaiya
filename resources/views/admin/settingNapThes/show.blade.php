@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.settingNapThe.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-nap-thes.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.settingNapThe.fields.id') }}
                        </th>
                        <td>
                            {{ $settingNapThe->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingNapThe.fields.title') }}
                        </th>
                        <td>
                            {{ $settingNapThe->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingNapThe.fields.header') }}
                        </th>
                        <td>
                            {{ $settingNapThe->header }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settingNapThe.fields.content') }}
                        </th>
                        <td>
                            {!! $settingNapThe->content !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.setting-nap-thes.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
