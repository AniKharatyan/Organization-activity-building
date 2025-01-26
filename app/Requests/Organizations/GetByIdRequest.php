<?php

namespace App\Requests\Organizations;

use Illuminate\Foundation\Http\FormRequest;

class GetByIdRequest extends FormRequest
{
    public function getId(): int
    {
        return $this->route('id');
    }
}
