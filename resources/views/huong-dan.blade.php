@extends('layouts.web', [
    'title' => $settingHuongDan->title
])

@section('content')
    <aside id="right" class="mainside">
        <div class="page">
            <div class="content_header border_box">
                <span class="latest_news vertical_center"> {{ $settingHuongDan->header }}</span>
            </div>
            <div class="page-body border_box self_clear">
                {!! $settingHuongDan->content !!}
            </div>
        </div>
    </aside>
@endsection
