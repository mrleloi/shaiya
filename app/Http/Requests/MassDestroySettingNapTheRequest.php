<?php

namespace App\Http\Requests;

use App\Models\SettingNapThe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySettingNapTheRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('setting_nap_the_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:setting_nap_thes,id',
        ];
    }
}
