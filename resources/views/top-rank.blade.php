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
                                <th>#</th>
                                <th>Tên nhân vật</th>
                                <th>Class</th>
                                <th>Level</th>
                                <th>Guild</th>
                                <th><a href="#K1">Kills</a></th>
                                <th><a href="#K2">Deaths</a></th>
                                <th><a href="#KDR">KDR</a></th>
                                <th>Rank</th>
                            </tr>

                            @foreach ($list as $c)
                                <tr>
                                    <td class="center">{{ $c->RowIndex }}</td>
                                    <td class="center">{{ htmlspecialchars($c->CharName) }}</td>
                                    <td class="center"><span class="{{ $c->Faction }}"><span class="ClassIcon {{ $c->CharClass }}" title="{{ htmlspecialchars($c->CharClass) }}">&nbsp;{{ htmlspecialchars($c->CharClass) }}</span></span></td>
                                    <td class="center">{{ $c->Level }}</td>
                                    <td class="center">{{ htmlspecialchars($c->GuildName) }}</td>
                                    <td class="center">{{ $c->K1 }}</td>
                                    <td class="center">{{ $c->K2 }}</td>
                                    <td class="center">{{ isset($c->KDR) ? (intval($c->KDR)*100) : "" }}</td>
                                    <td class="center">{{ $c->Rank < 10 ? $c->Rank : str_pad($c->Rank,2,0,STR_PAD_LEFT) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </center>

                    @if ($list->hasPages())
                        <div class="news_pagi border_box self_clear">
                            <div class="news_pagi-left">
                                {{ $list->appends(request()->query())->links() }}
                            </div>
                        </div>
                    @endif

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
