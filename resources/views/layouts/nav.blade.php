
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

    <section class="sidebox_topvoters topvoter sidebox" style="margin-bottom: 15px; padding-bottom: 20px; margin-top: 15px;">
        <div class="card left-row" style="height: 111px;">
            <a href="{{ route('nap-the') }}" title="Nạp thẻ" class="nap-tien"></a>
        </div>
    </section>

    <section class="sidebox_topvoters topvoter sidebox" style="margin-bottom: 15px; padding-bottom: 20px; margin-top: 15px;">
        <div class="fb-group" data-href="{{ $settingGeneral->url_group }}" data-width="317" data-show-social-context="true" data-show-metadata="false"></div>
    </section>
</aside>
