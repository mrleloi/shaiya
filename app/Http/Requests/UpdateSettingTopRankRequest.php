<?php

namespace App\Http\Requests;

use App\Models\SettingTopRank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingTopRankRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_top_rank_edit');
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
            'num_display' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
