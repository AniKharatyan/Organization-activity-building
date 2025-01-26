<?php

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;
use App\Repositories\Read\Activity\ActivityReadRepository;
use App\Repositories\Read\Organization\OrganizationReadRepository;
use App\Repositories\Read\Activity\ActivityReadRepositoryInterface;
use App\Repositories\Read\Organization\OrganizationReadRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            OrganizationReadRepositoryInterface::class,
            OrganizationReadRepository::class
        );

        $this->app->bind(
            ActivityReadRepositoryInterface::class,
            ActivityReadRepository::class
        );
    }
}
