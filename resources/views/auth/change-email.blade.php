@extends('layouts.web', [
    'title' => __('Change email')
])

@section('content')
    <aside id="right" class="mainside">
        <div class="page">
            <div class="content_header border_box">
                <span class="latest_news vertical_center"> {{ __('Change email') }}</span>
            </div>
            <div class="page-body border_box self_clear">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form class="form-horizontal" method="POST" action="{{ route('action-doi-email') }}">
                                        {{ csrf_field() }}

                                        <div
                                            class="form-group{{ $errors->has('current-email') ? ' has-error' : '' }}">
                                            <label for="Email" class="col-md-4 control-label">{{ __('Current email') }}</label>

                                            <div class="col-md-6">
                                                <input id="current-email" type="email" class="form-control"
                                                       name="current-email" value="{{ old('current-email') }}" required>

                                                @if ($errors->has('current-email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('current-email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">
                                            <label for="Email" class="col-md-4 control-label">{{ __('New email') }}</label>

                                            <div class="col-md-6">
                                                <input id="Email" type="email" value="{{ old('Email') }}" class="form-control"
                                                       name="Email" required>

                                                @if ($errors->has('Email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('Email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-top: 20px;text-align: center;">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="nice_button">
                                                    {{ __('Change email') }}
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
