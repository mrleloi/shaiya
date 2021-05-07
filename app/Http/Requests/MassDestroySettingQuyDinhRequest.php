<?php

namespace App\Http\Requests;

use App\Models\SettingQuyDinh;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySettingQuyDinhRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('setting_quy_dinh_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:setting_quy_dinhs,id',
        ];
    }
}
