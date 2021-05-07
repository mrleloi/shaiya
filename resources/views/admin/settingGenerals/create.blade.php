@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.settingGeneral.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.setting-generals.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.settingGeneral.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingGeneral.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="url_ico">{{ trans('cruds.settingGeneral.fields.url_ico') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('url_ico') ? 'is-invalid' : '' }}" id="url_ico-dropzone">
                    </div>
                    @if($errors->has('url_ico'))
                        <span class="text-danger">{{ $errors->first('url_ico') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingGeneral.fields.url_ico_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="url_logo">{{ trans('cruds.settingGeneral.fields.url_logo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('url_logo') ? 'is-invalid' : '' }}" id="url_logo-dropzone">
                    </div>
                    @if($errors->has('url_logo'))
                        <span class="text-danger">{{ $errors->first('url_logo') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingGeneral.fields.url_logo_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="url_background">{{ trans('cruds.settingGeneral.fields.url_background') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('url_background') ? 'is-invalid' : '' }}" id="url_background-dropzone">
                    </div>
                    @if($errors->has('url_background'))
                        <span class="text-danger">{{ $errors->first('url_background') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingGeneral.fields.url_background_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="url_fanpage">{{ trans('cruds.settingGeneral.fields.url_fanpage') }}</label>
                    <input class="form-control {{ $errors->has('url_fanpage') ? 'is-invalid' : '' }}" type="text" name="url_fanpage" id="url_fanpage" value="{{ old('url_fanpage', '') }}">
                    @if($errors->has('url_fanpage'))
                        <span class="text-danger">{{ $errors->first('url_fanpage') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingGeneral.fields.url_fanpage_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="url_group">{{ trans('cruds.settingGeneral.fields.url_group') }}</label>
                    <input class="form-control {{ $errors->has('url_group') ? 'is-invalid' : '' }}" type="text" name="url_group" id="url_group" value="{{ old('url_group', '') }}">
                    @if($errors->has('url_group'))
                        <span class="text-danger">{{ $errors->first('url_group') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingGeneral.fields.url_group_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="meta_des">{{ trans('cruds.settingGeneral.fields.meta_des') }}</label>
                    <textarea class="form-control {{ $errors->has('meta_des') ? 'is-invalid' : '' }}" name="meta_des" id="meta_des">{{ old('meta_des') }}</textarea>
                    @if($errors->has('meta_des'))
                        <span class="text-danger">{{ $errors->first('meta_des') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingGeneral.fields.meta_des_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="meta_keyword">{{ trans('cruds.settingGeneral.fields.meta_keyword') }}</label>
                    <textarea class="form-control {{ $errors->has('meta_keyword') ? 'is-invalid' : '' }}" name="meta_keyword" id="meta_keyword">{{ old('meta_keyword') }}</textarea>
                    @if($errors->has('meta_keyword'))
                        <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settingGeneral.fields.meta_keyword_helper') }}</span>
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

@section('scripts')
    <script>
        Dropzone.options.urlIcoDropzone = {
            url: '{{ route('admin.setting-generals.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="url_ico"]').remove()
                $('form').append('<input type="hidden" name="url_ico" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="url_ico"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($settingGeneral) && $settingGeneral->url_ico)
                var file = {!! json_encode($settingGeneral->url_ico) !!}
                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="url_ico" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.urlLogoDropzone = {
            url: '{{ route('admin.setting-generals.storeMedia') }}',
            maxFilesize: 10, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 10,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="url_logo"]').remove()
                $('form').append('<input type="hidden" name="url_logo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="url_logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($settingGeneral) && $settingGeneral->url_logo)
                var file = {!! json_encode($settingGeneral->url_logo) !!}
                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="url_logo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.urlBackgroundDropzone = {
            url: '{{ route('admin.setting-generals.storeMedia') }}',
            maxFilesize: 20, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 20,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="url_background"]').remove()
                $('form').append('<input type="hidden" name="url_background" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="url_background"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($settingGeneral) && $settingGeneral->url_background)
                var file = {!! json_encode($settingGeneral->url_background) !!}
                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="url_background" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
