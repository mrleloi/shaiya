<?php

namespace App\Http\Requests;

use App\Models\SettingChienTich;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySettingChienTichRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('setting_chien_tich_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:setting_chien_tiches,id',
        ];
    }
}
