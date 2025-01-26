<?php

namespace App\Actions\Organization;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\Organization\OrganizationReadRepositoryInterface;

class GetByIdAction
{
    public function __construct(
        public OrganizationReadRepositoryInterface $organizationReadRepository
    ) {}

    public function execute(int $organizationId): Collection|array
    {
        return $this->organizationReadRepository->getById($organizationId);
    }
}
