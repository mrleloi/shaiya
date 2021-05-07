@extends('layouts.web', [
    'title' => $settingDownload->title
])

@section('content')
    <aside id="right" class="mainside">
        <div class="page">
            <div class="content_header border_box">
                <span class="latest_news vertical_center"> {{ $settingDownload->header }}</span>
            </div>
            <div class="page-body border_box self_clear">
                {!! $settingDownload->content !!}

                <div>
                    <br>
                    <font color="#FF8C00" size="3">&nbsp;&nbsp;&nbsp;&nbsp;Link Google Driver</font><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="{{ $settingDownload->link_gdrive }}"
                        target="_blank">
                        <img src="images/down.png" border="0"></a>
                    <br><br>
                    <font color="#FF8C00" size="3">&nbsp;&nbsp;&nbsp;&nbsp;Link Mega</font><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="{{ $settingDownload->link_mega }}"
                        target="_blank"><img src="images/down.png" border="0"></a>
                    <br><br><br>
                    <font color="yellow" size="3">&nbsp;&nbsp;&nbsp;&nbsp;Hướng dẫn tải game:</font>
                    <br><br>
                    <div class="menu" style="text-align: left; display: block;">
                        <p>
                            <iframe width="650" height="315" src="https://www.youtube.com/embed/n5NYuLra6dg"
                                    frameborder="0" allowfullscreen=""></iframe>
                        </p>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </aside>
@endsection
