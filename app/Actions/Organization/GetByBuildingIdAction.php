<?php

namespace App\Actions\Organization;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\Organization\OrganizationReadRepositoryInterface;

class GetByBuildingIdAction
{
    public function __construct(
        public OrganizationReadRepositoryInterface $organizationReadRepository
    ) {}

    public function execute(int $buildingId): Collection|array
    {
        return $this->organizationReadRepository->getByBuildingId($buildingId);
    }
}
