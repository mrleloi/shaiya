<?php

namespace App\Http\Requests;

use App\Models\SettingHuongDan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySettingHuongDanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('setting_huong_dan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:setting_huong_dans,id',
        ];
    }
}
