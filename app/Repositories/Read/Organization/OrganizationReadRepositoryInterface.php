<?php

namespace App\Repositories\Read\Organization;

use App\Dtos\Organizations\GetByRadiusDto;
use Illuminate\Database\Eloquent\Collection;

interface OrganizationReadRepositoryInterface
{
    public function getByBuildingId(int $buildingId): Collection|array;
    public function getByActivityId(int $activityId): Collection|array;
    public function getByRadius(GetByRadiusDto $dto): Collection|array;
    public function getById(int $organizationId): Collection|array;
    public function searchByName(string $name): Collection|array;
    public function getByActivityTreeId(array $activityIds): Collection|array;
}
