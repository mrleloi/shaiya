@extends('layouts.web', [
    'title' => __('Login')
])

@section('content')
    <aside id="right" class="mainside">
        <div class="page">
            <div class="content_header border_box">
                <span class="latest_news vertical_center"> ĐĂNG NHẬP</span>
            </div>
            <div class="page-body border_box self_clear">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('action-dang-nhap') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="UserID" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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

                                            <div class="col-md-6">
                                                <input id="Pw" type="password" class="form-control @error('Pw') is-invalid @enderror" name="Pw" required autocomplete="new-password">

                                                @error('Pw')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--<div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>--}}

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="nice_button">
                                                    {{ __('Login') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <section id="forgot"><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></section>
                                                @endif
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
