<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends Request
{
    public function rules()
    {
        return [
            'content'   => 'required'
        ];
    }
}
