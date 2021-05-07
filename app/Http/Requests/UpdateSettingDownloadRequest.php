<?php

namespace App\Http\Requests;

use App\Models\SettingDownload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingDownloadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_download_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:1',
                'max:1000',
                'nullable',
            ],
            'header' => [
                'string',
                'min:1',
                'max:1000',
                'required',
            ],
        ];
    }
}
