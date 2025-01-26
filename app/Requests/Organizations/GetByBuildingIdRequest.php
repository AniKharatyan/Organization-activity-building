<?php

namespace App\Requests\Organizations;

use Illuminate\Foundation\Http\FormRequest;

class GetByBuildingIdRequest extends FormRequest
{
    public function getBuildingId(): int
    {
        return $this->route('buildingId');
    }
}
