<?php

namespace App\Requests\Organizations;

use Illuminate\Foundation\Http\FormRequest;

class GetByActivityIdRequest extends FormRequest
{
    public function getActivityId(): int
    {
        return $this->route('activityId');
    }
}
