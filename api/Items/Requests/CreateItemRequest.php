<?php

namespace Api\Items\Requests;

use Infrastructure\Http\ApiRequest;

class CreateItemRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'item' => 'array|required',
//            'item.email' => 'required|email',
//            'item.name' => 'required|string',
//            'item.password' => 'required|string|min:8'
        ];
    }

    public function attributes()
    {
        return [
//            'item.email' => 'the item\'s email'
        ];
    }
}
