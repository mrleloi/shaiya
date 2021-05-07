@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.settingDownload.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-SettingDownload">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.settingDownload.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingDownload.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingDownload.fields.header') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingDownload.fields.link_gdrive') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingDownload.fields.link_mega') }}
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
                    @foreach($settingDownloads as $key => $settingDownload)
                        <tr data-entry-id="{{ $settingDownload->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $settingDownload->id ?? '' }}
                            </td>
                            <td>
                                {{ $settingDownload->title ?? '' }}
                            </td>
                            <td>
                                {{ $settingDownload->header ?? '' }}
                            </td>
                            <td>
                                {{ $settingDownload->link_gdrive ?? '' }}
                            </td>
                            <td>
                                {{ $settingDownload->link_mega ?? '' }}
                            </td>
                            <td>
                                @can('setting_download_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.setting-downloads.show', $settingDownload->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('setting_download_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.setting-downloads.edit', $settingDownload->id) }}">
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
            let table = $('.datatable-SettingDownload:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
