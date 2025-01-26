<?php

namespace App\Requests\Organizations;

use Illuminate\Foundation\Http\FormRequest;

class GetByRadiusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'latitude' => [
                'required',
                'numeric',
                'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',
            ],
            'longitude' => [
                'required',
                'numeric',
                'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',
            ],
            'radius' => [
                'required',
                'numeric',
                'min:0',
            ],
        ];
    }

    public function getLatitude(): float
    {
        return $this->get('latitude');
    }

    public function getLongitude(): float
    {
        return $this->get('longitude');
    }

    public function getRadius(): float
    {
        return $this->get('radius');
    }
}
