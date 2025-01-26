<?php

namespace App\Requests\Organizations;

use Illuminate\Foundation\Http\FormRequest;

class SearchByNameRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }

    public function getName(): string
    {
        return $this->get('name');
    }
}
