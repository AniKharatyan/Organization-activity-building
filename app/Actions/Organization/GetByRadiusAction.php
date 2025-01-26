<?php

namespace App\Actions\Organization;

use App\Dtos\Organizations\GetByRadiusDto;
use App\Repositories\Read\Organization\OrganizationReadRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetByRadiusAction
{
    public function __construct(
        public OrganizationReadRepositoryInterface $organizationReadRepository
    ) {}

    public function execute(GetByRadiusDto $dto): Collection|array
    {
        return $this->organizationReadRepository->getByRadius($dto);
    }
}
