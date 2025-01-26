<?php

namespace App\Repositories\Read\Organization;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Builder;
use App\Dtos\Organizations\GetByRadiusDto;
use Illuminate\Database\Eloquent\Collection;

class OrganizationReadRepository implements OrganizationReadRepositoryInterface
{
    private function query(): Builder
    {
        return Organization::query();
    }

    public function getByBuildingId(int $buildingId): Collection|array
    {
        return $this->query()
            ->where('building_id', $buildingId)
            ->with(['building', 'activities' => fn($query) => $query->withRecursiveChildren()])
            ->get();
    }

    public function getByActivityId(int $activityId): Collection|array
    {
        return $this->query()
            ->whereHas('activities', fn($query) => $query->where('activities.id', $activityId))
            ->with(['building', 'activities' => fn($query) => $query->withRecursiveChildren()])
            ->get();
    }

    public function getByRadius(GetByRadiusDto $dto): Collection|array
    {
        return $this->query()
            ->whereHas('building', function ($query) use ($dto) {
                $query->whereRaw('ST_Distance_Sphere(
                point(longitude, latitude),
                point(?, ?)) <= ?', [$dto->longitude, $dto->latitude, $dto->radius * 1000]);
            })
            ->with(['building', 'activities' => fn($query) => $query->withRecursiveChildren()])
            ->get();
    }

    public function getById(int $organizationId): Collection|array
    {
        return $this->query()
            ->where('id', $organizationId)
            ->with(['building', 'activities' => fn($query) => $query->withRecursiveChildren()])
            ->get();
    }

    public function searchByName(string $name): Collection|array
    {
        return $this->query()
            ->where('name', 'like', "%$name%")
            ->with(['building', 'activities' => fn($query) => $query->withRecursiveChildren()])
            ->get();
    }

    public function getByActivityTreeId(array $activityIds): Collection|array
    {
        return $this->query()
            ->whereHas('activities', fn($query) => $query->whereIn('activities.id', $activityIds))
            ->with(['building', 'activities' => fn($query) => $query->withRecursiveChildren()])
            ->get();
    }
}
