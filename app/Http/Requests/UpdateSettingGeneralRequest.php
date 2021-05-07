<?php

namespace App\Http\Requests;

use App\Models\SettingGeneral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingGeneralRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_general_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:1',
                'max:1000',
                'required',
            ],
            'url_fanpage' => [
                'string',
                'min:1',
                'max:1000',
                'nullable',
            ],
            'url_group' => [
                'string',
                'min:1',
                'max:1000',
                'nullable',
            ],
        ];
    }
}
