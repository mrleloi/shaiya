@extends('layouts.web', [
    'title' => $settingTopRank->title
])

@section('content')
    <aside id="right" class="mainside">
        <div class="page">
            <div class="content_header border_box">
                <span class="latest_news vertical_center"> {{ $settingTopRank->header }}</span>
            </div>
            <div class="page-body border_box self_clear">

                <center>
                    @if (!request()->has('lm') || request()->get('lm') == '1')
                    <strong style="color: #c9c4c4;">Liên minh Ánh sáng</strong><div style="padding-left: 30px; display: inline;"></div>
                    <a href="?lm=2">Liên minh Phẫn nộ</a><div style="padding-left: 30px; display: inline;"></div>
                    @else
                    <a href="?lm=1">Liên minh Ánh sáng</a><div style="padding-left: 30px; display: inline;"></div>
                    <strong style="color: #c9c4c4;">Liên minh Phẫn nộ</strong><div style="padding-left: 30px; display: inline;"></div>
                    @endif
                    <br>
                    <br>
                </center>

                @if (!$list->isEmpty())
                    <center>
                    <table class="nice_table" border="0" cellspacing="5" cellpadding="1">
                        <tbody>
                        <tr>
                            <td width="5%" align="center">Hạng</td>
                            <td width="20%">Tên Nhân Vật</td>
                            <td width="100px" align="center">Class</td>
                            <td width="30%" align="center">Nghề Nghiệp</td>
                            <td width="15%" align="center">Chiến tích</td>
                        </tr>

                        @foreach ($list as $item)
                        <tr>
                            <td class="center">1</td>
                            <td class="orange" style="padding-left: 10px;">BlackEagle</td>
                            <td class="center"><img src="https://sh-anubis.com//images/ranking/1.png"></td>
                            <td class="center">Chiến binh</td>
                            <td class="center">119 228</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </center>

                    <div class="news_pagi border_box self_clear">
                        <div class="news_pagi-left">
                            {{ $list->appends(request()->query())->links() }}
                        </div>
                    </div>

                @else

                    <div class="news_pagi border_box self_clear">
                        <div class="news_pagi-left">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled" aria-disabled="true" aria-label="« Trước">
                                        <span class="page-link" aria-hidden="true">Không có người dùng nào được xếp hạng.</span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </aside>
@endsection
