<?php

namespace App\Http\Requests;

use App\Models\PostEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPostEventRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('post_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:post_events,id',
        ];
    }
}
