@extends('layouts.web', [
    'title' => __('Register')
])

@section('content')
    <aside id="right" class="mainside">
        <div class="page">
            <div class="content_header border_box">
                <span class="latest_news vertical_center"> ĐĂNG KÝ TÀI KHOẢN</span>
            </div>
            <div class="page-body border_box self_clear">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card" style="height: 100%;">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('action-dang-ky') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="UserName" class="col-md-4 col-form-label text-md-right">{{ __('Fullname') }}</label>
                                            <label for="" class="lbl-form-required">*</label>
                                            <label for="" class="lbl-form-des">(Từ 4 đến 20 ký tự)</label>

                                            <div class="col-md-6">
                                                <input id="UserName" type="text" class="form-control @error('UserName') is-invalid @enderror" name="UserName" value="{{ old('UserName') }}" required autocomplete="fullname" autofocus>

                                                @error('UserName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="UserID" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                            <label for="" class="lbl-form-required">*</label>
                                            <label for="" class="lbl-form-des">(Từ 4 đến 12 ký tự - Không dấu)</label>

                                            <div class="col-md-6">
                                                <input id="UserID" type="text" class="form-control @error('UserID') is-invalid @enderror" name="UserID" value="{{ old('UserID') }}" required autocomplete="new-password" autofocus>

                                                @error('UserID')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Pw" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                            <label for="" class="lbl-form-required">*</label>
                                            <label for="" class="lbl-form-des">(Từ 6 đến 12 ký tự)</label>

                                            <div class="col-md-6">
                                                <input id="Pw" type="password" class="form-control @error('Pw') is-invalid @enderror" name="Pw" required autocomplete="new-password">

                                                @error('Pw')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Pw-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                            <label for="" class="lbl-form-required">*</label>

                                            <div class="col-md-6">
                                                <input id="Pw-confirm" type="password" class="form-control" name="Pw_confirm" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        {{--<div class="form-group row">
                                            <label for="password2" class="col-md-4 col-form-label text-md-right">{{ __('Password 2') }}</label>
                                            <label for="" class="lbl-form-des">(Từ 4 đến 16 ký tự)</label>

                                            <div class="col-md-6">
                                                <input id="password2" type="password" class="form-control @error('password2') is-invalid @enderror" name="password2" required autocomplete="new-password">

                                                @error('password2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password2-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password 2') }}</label>

                                            <div class="col-md-6">
                                                <input id="password2-confirm" type="password" class="form-control" name="password2_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>--}}

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <label for="" class="lbl-form-required">*</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--<div class="form-group row">
                                            <label for="cmnd" class="col-md-4 col-form-label text-md-right">{{ __('CMND') }}</label>

                                            <div class="col-md-6">
                                                <input id="cmnd" type="text" class="form-control @error('cmnd') is-invalid @enderror" name="cmnd" value="{{ old('cmnd') }}" required autocomplete="cmnd">

                                                @error('cmnd')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>--}}

                                        <div class="form-group row" style="margin: 15px auto 0; text-align: center;">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="nice_button">
                                                    {{ __('Register') }}
                                                </button>
                                                <button type="reset" class="nice_button">
                                                    {{ __('Reset Form') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
@endsection
