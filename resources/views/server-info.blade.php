@extends('layouts.web', [
    'title' => $settingServerInfo->title
])

@section('content')
    <aside id="right" class="mainside">
        <div class="page">
            <div class="content_header border_box">
                <span class="latest_news vertical_center"> {{ $settingServerInfo->header }}</span>
            </div>
            <div class="page-body border_box self_clear">
                {!! $settingServerInfo->content !!}
            </div>
        </div>
    </aside>
@endsection
