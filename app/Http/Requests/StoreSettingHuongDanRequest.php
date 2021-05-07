<?php

namespace App\Http\Requests;

use App\Models\SettingHuongDan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSettingHuongDanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_huong_dan_create');
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
            'content' => [
                'required',
            ],
        ];
    }
}
