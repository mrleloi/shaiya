<?php

namespace App\Http\Requests;

use App\Models\SettingHome;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSettingHomeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_home_create');
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
            'num_news_display' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'num_events_display' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
