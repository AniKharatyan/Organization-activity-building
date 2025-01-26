<?php

namespace App\Actions\Organization;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\Organization\OrganizationReadRepositoryInterface;

class GetByActivityIdAction
{
    public function __construct(
        public OrganizationReadRepositoryInterface $organizationReadRepository
    ) {}

    public function execute(int $activityId): Collection|array
    {
        return $this->organizationReadRepository->getByActivityId($activityId);
    }
}
