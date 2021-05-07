<?php

namespace App\Http\Requests;

use App\Models\SettingServerInfo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySettingServerInfoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('setting_server_info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:setting_server_infos,id',
        ];
    }
}
