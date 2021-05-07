<?php

namespace App\Http\Requests;

use App\Models\PostEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePostEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('post_event_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:1',
                'max:10000',
                'required',
            ],
            'content' => [
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
