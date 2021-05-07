@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.settingHome.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.setting-homes.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{ trans('cruds.settingHome.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingHome.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="num_news_display">{{ trans('cruds.settingHome.fields.num_news_display') }}</label>
                    <input class="form-control {{ $errors->has('num_news_display') ? 'is-invalid' : '' }}" type="number" name="num_news_display" id="num_news_display" value="{{ old('num_news_display', '10') }}" step="1" required>
                    @if($errors->has('num_news_display'))
                        <span class="text-danger">{{ $errors->first('num_news_display') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingHome.fields.num_news_display_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="num_events_display">{{ trans('cruds.settingHome.fields.num_events_display') }}</label>
                    <input class="form-control {{ $errors->has('num_events_display') ? 'is-invalid' : '' }}" type="number" name="num_events_display" id="num_events_display" value="{{ old('num_events_display', '10') }}" step="1" required>
                    @if($errors->has('num_events_display'))
                        <span class="text-danger">{{ $errors->first('num_events_display') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingHome.fields.num_events_display_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
