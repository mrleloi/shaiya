@extends('layouts.web', [
    'title' => $settingChienTich->title
])

@section('content')
    <aside id="right" class="mainside">
        <div class="page">
            <div class="content_header border_box">
                <span class="latest_news vertical_center"> {{ $settingChienTich->header }}</span>
            </div>
            <div class="page-body border_box self_clear">

                <center>
                    @if (request()->has('pvp') && request()->get('pvp') == '1')
                    <strong style="color: #c9c4c4;">1-15</strong><div style="padding-left: 30px; display: inline;"></div>
                    @else
                    <a href="?pvp=1">1-15</a><div style="padding-left: 30px; display: inline;"></div>
                    @endif
                    @if (request()->has('pvp') && request()->get('pvp') == '2')
                    <strong style="color: #c9c4c4;">16-30</strong><div style="padding-left: 30px; display: inline;"></div>
                    @else
                    <a href="?pvp=2">16-30</a><div style="padding-left: 30px; display: inline;"></div>
                    @endif
                    @if (request()->has('pvp') && request()->get('pvp') == '3')
                    <strong style="color: #c9c4c4;">31-60</strong><div style="padding-left: 30px; display: inline;"></div>
                    @else
                    <a href="?pvp=3">31-60</a><div style="padding-left: 30px; display: inline;"></div>
                    @endif
                    @if (!request()->has('pvp') || request()->get('pvp') == '4')
                    <strong style="color: #c9c4c4;">All</strong><div style="padding-left: 30px; display: inline;"></div>
                    @else
                    <a href="?pvp=4">All</a>
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
                                <td width="150px" align="center">Class</td>
                                <td width="10%" align="center">Cấp Độ</td>
                                <td width="15%" align="center">Liên Minh</td>
                                <td width="15%" align="center">Hội</td>
                                <td width="200px" align="center">Tiêu Diệt</td>
                                <td width="200px" align="center">Tử Vong</td>
                            </tr>

                            @foreach ($list as $item)
                                <tr>
                                    <td class="center">1</td>
                                    <td class="orange" style="padding-left: 10px;">BlackEagle</td>
                                    <td class="center"><img src="https://sh-anubis.com//images/ranking/1.png"></td>
                                    <td class="center">60</td>
                                    <td class="center">Phẫn nộ</td>
                                    <td class="center">FullHouse</td>
                                    <td class="center">119 228</td>
                                    <td class="center">4254</td>
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
