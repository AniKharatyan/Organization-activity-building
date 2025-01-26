<?php

namespace App\Repositories\Read\Activity;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Builder;

class ActivityReadRepository implements ActivityReadRepositoryInterface
{
    private function query(): Builder
    {
        return Activity::query();
    }

    public function getById(int $activityId): array
    {
        return $this->query()
            ->where('id', $activityId)
            ->orWhere('parent_id', $activityId)
            ->orWhereHas('parent', function ($query) use ($activityId) {
                $query->where('parent_id', $activityId);
            })
            ->pluck('id')
            ->toArray();
    }
}
