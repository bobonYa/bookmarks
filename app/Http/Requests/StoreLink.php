<?php

namespace App\Http\Requests;

use App\Http\Controllers\Classes\LinkParser;
use Illuminate\Foundation\Http\FormRequest;

class StoreLink extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'link' => [
                'required',
                'unique:links',
                'active_url',
                ]
        ];
    }
}
