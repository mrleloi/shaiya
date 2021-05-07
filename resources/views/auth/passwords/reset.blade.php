@extends('layouts.web', [
    'title' => __('Reset Password')
])

@section('content')
    <aside id="right" class="mainside">
        <div class="page">
            <div class="content_header border_box">
                <span class="latest_news vertical_center"> {{ __('Reset Password') }}</span>
            </div>
            <div class="page-body border_box self_clear">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('action-reset-mat-khau') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
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

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="nice_button">
                                                    {{ __('Reset Password') }}
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
