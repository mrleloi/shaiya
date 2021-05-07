@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.settingGeneral.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-SettingGeneral">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_ico') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_background') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_fanpage') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.url_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.meta_des') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingGeneral.fields.meta_keyword') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settingGenerals as $key => $settingGeneral)
                        <tr data-entry-id="{{ $settingGeneral->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $settingGeneral->id ?? '' }}
                            </td>
                            <td>
                                {{ $settingGeneral->title ?? '' }}
                            </td>
                            <td>
                                @if($settingGeneral->url_ico)
                                    <a href="{{ $settingGeneral->url_ico->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $settingGeneral->url_ico->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($settingGeneral->url_logo)
                                    <a href="{{ $settingGeneral->url_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $settingGeneral->url_logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($settingGeneral->url_background)
                                    <a href="{{ $settingGeneral->url_background->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $settingGeneral->url_background->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $settingGeneral->url_fanpage ?? '' }}
                            </td>
                            <td>
                                {{ $settingGeneral->url_group ?? '' }}
                            </td>
                            <td>
                                {{ $settingGeneral->meta_des ?? '' }}
                            </td>
                            <td>
                                {{ $settingGeneral->meta_keyword ?? '' }}
                            </td>
                            <td>
                                @can('setting_general_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.setting-generals.show', $settingGeneral->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('setting_general_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.setting-generals.edit', $settingGeneral->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan


                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 25,
            });
            let table = $('.datatable-SettingGeneral:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
            $('div#sidebar').on('transitionend', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            })

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {
                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value

                let index = $(this).parent().index()
                if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                }

                table
                    .column(index)
                    .search(value, strict)
                    .draw()
            });
            table.on('column-visibility.dt', function(e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function(colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })
        })

    </script>
@endsection
