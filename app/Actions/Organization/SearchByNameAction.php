<?php

namespace App\Actions\Organization;

use App\Repositories\Read\Organization\OrganizationReadRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SearchByNameAction
{
    public function __construct(
        public OrganizationReadRepositoryInterface $organizationReadRepository
    ) {}

    public function execute(string $name): Collection|array
    {
        return $this->organizationReadRepository->searchByName($name);
    }
}
