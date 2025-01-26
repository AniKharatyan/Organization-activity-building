<?php

namespace App\Actions\Organization;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\Activity\ActivityReadRepositoryInterface;
use App\Repositories\Read\Organization\OrganizationReadRepositoryInterface;

class GetByActivityTreeAction
{
    public function __construct(
        public OrganizationReadRepositoryInterface $organizationReadRepository,
        public ActivityReadRepositoryInterface $activityReadRepository
    ) {}

    public function execute(int $activityId): Collection|array
    {
        $activityIds = $this->activityReadRepository->getById($activityId);

        return $this->organizationReadRepository->getByActivityTreeId($activityIds);
    }
}
