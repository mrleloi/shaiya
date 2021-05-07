@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.settingChienTich.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-SettingChienTich">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.settingChienTich.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingChienTich.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingChienTich.fields.header') }}
                        </th>
                        <th>
                            {{ trans('cruds.settingChienTich.fields.num_display') }}
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
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settingChienTiches as $key => $settingChienTich)
                        <tr data-entry-id="{{ $settingChienTich->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $settingChienTich->id ?? '' }}
                            </td>
                            <td>
                                {{ $settingChienTich->title ?? '' }}
                            </td>
                            <td>
                                {{ $settingChienTich->header ?? '' }}
                            </td>
                            <td>
                                {{ $settingChienTich->num_display ?? '' }}
                            </td>
                            <td>
                                @can('setting_chien_tich_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.setting-chien-tiches.show', $settingChienTich->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('setting_chien_tich_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.setting-chien-tiches.edit', $settingChienTich->id) }}">
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
            let table = $('.datatable-SettingChienTich:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
