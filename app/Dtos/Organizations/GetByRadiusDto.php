<?php

namespace App\Dtos\Organizations;

use App\Requests\Organizations\GetByRadiusRequest;

class GetByRadiusDto
{
    public function __construct(
        public float $latitude,
        public float $longitude,
        public float $radius
    ) {}

    public static function fromRequest(GetByRadiusRequest $request): self
    {
        return new self(
            latitude: $request->getLatitude(),
            longitude: $request->getLongitude(),
            radius: $request->getRadius()
        );
    }
}
