<?php

namespace App\Repositories\Read\Activity;

interface ActivityReadRepositoryInterface
{
    public function getById(int $activityId): array;
}
