
<aside id="left" class="sidebar border_box">

    <section id="sidebox_info_login" class="sidebox" style="padding-bottom: 10px;">
        <div class="sidebox_body border_box">

            @if (Auth::guard('web')->check())

                <div style="display: block;" class="log" id="log">

                    <div id="cp" style="font-size:16px" class="login_success">
                        Xin chào, <b style="color:#A6EBF6">{{ Auth::guard('web')->user()->UserID }}</b><br>
                        Ecoin : <b style="color:red">{{ Auth::guard('web')->user()->Point }}</b><br>
                        <ul style="list-style: disc;padding-left: 15px;">
                            <li style="list-style: disc;"><a href="{{ route('doi-mat-khau') }}">Đổi mật khẩu</a><br></li>
                            <li style="list-style: disc;"><a href="{{ route('doi-email') }}">Đổi địa chỉ Email</a><br></li>
                        </ul>
                        <form id="logout-form" action="{{ route('dang-xuat') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a href="{{ route('dang-xuat') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Thoát
                        </a>
                    </div>
                </div>

            @else

                <form action="{{ route('action-dang-nhap') }}" method="post" accept-charset="utf-8" autocomplete="off">
                    {{ csrf_field() }}
                    <center id="sidebox_login">
                        <input type="text" name="UserID" id="login_username" value="" placeholder="Tài khoản" autocomplete="new-password">
                        <input type="password" name="Pw" id="login_password" value="" placeholder="Mật khẩu" autocomplete="new-password">
                        <input type="submit" name="login_submit" value="Đăng Nhập">
                    </center>
                </form>
                <center style="margin-top: 5px;">
                    <input type="submit" value="Tạo Tài Khoản" onclick="window.location='{{ route('dang-ky') }}';">
                    <section id="forgot"><a href="{{ route('quen-mat-khau') }}">{{ __('Forgot Your Password?') }}</a></section>
                </center>

            @endif
        </div>
    </section>

    <section class="sidebox_topvoters topvoter sidebox" style="margin-bottom: 15px; padding-bottom: 0px; margin-top: 15px;">
        <h4 class="sidebox_title border_box">
            <i>PvP RANKING</i>
            <div class="topvoter_desc" style="right: 5px;"><a href="{{ route('chien-tich') }}">Xem toàn bộ</a></div>
        </h4>
        <div class="sidebox_body border_box">
            @if (!$listNavPvpRanking->isEmpty())
                @foreach ($listNavPvpRanking as $c)
                    <div class="topvoter_row">
                        <div class="topvoter_col col_rank">1</div>
                        <div class="topvoter_col col_name">
                            {{ htmlspecialchars($c->CharName) }}</div>
                        <div class="topvoter_col col_vote">
                            <i>{{ $c->K1 }}</i> kills
                        </div>
                    </div>
                @endforeach
            @else
                <div class="topvoter_row">
                    <span class="page-link" aria-hidden="true">Không có người dùng nào được xếp hạng.</span>
                </div>

            @endif

        </div>
    </section>

    <section class="sidebox_topvoters topvoter sidebox" style="margin-bottom: 15px; padding-bottom: 0px; margin-top: 15px;">
        <h4 class="sidebox_title border_box">
            <i>TOP LEVEL</i>
            <div class="topvoter_desc" style="right: 5px;"><a href="{{ route('top-rank') }}">Xem toàn bộ</a></div>
        </h4>
        <div class="sidebox_body border_box">
            @if (!$listNavTopLevel->isEmpty())
                @foreach ($listNavTopLevel as $c)
                    <div class="topvoter_row">
                        <div class="topvoter_col col_rank">1</div>
                        <div class="topvoter_col col_name">
                            {{ htmlspecialchars($c->CharName) }}</div>
                        <div class="topvoter_col col_vote">
                            Lv <i>{{ $c->Level }}</i>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="topvoter_row">
                    <span class="page-link" aria-hidden="true">Không có người dùng nào được xếp hạng.</span>
                </div>

            @endif

        </div>
    </section>

    <section class="sidebox_topvoters topvoter sidebox" style="margin-bottom: 15px; padding-bottom: 20px; margin-top: 15px;">
        <div class="card left-row" style="height: 111px;">
            <a href="{{ route('nap-the') }}" title="Nạp thẻ" class="nap-tien"></a>
        </div>
    </section>

    <section class="sidebox_topvoters topvoter sidebox" style="margin-bottom: 15px; padding-bottom: 20px; margin-top: 15px;">
        <div class="fb-group" data-href="{{ $settingGeneral->url_group }}" data-width="317" data-show-social-context="true" data-show-metadata="false"></div>
    </section>
</aside>
