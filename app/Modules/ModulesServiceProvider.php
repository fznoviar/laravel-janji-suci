<?php

namespace App\Modules;

use App\Modules\EInvitation\Contracts\EInvitationRepositoryInterface;
use App\Modules\EInvitation\EInvitationRepository;
use App\Modules\Guest\Contracts\GuestRepositoryInterface;
use App\Modules\Guest\Group\Contracts\GuestGroupRepositoryInterface;
use App\Modules\Guest\Group\GuestGroupRepository;
use App\Modules\Guest\GuestRepository;
use App\Modules\Project\Contracts\ProjectRepositoryInterface;
use App\Modules\Project\ProjectRepository;
use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        /**
         * Project Classes
         */
        $this->app->singleton(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );

        /**
         * Guest Classes
         */
        $this->app->singleton(
            GuestRepositoryInterface::class,
            GuestRepository::class
        );

        $this->app->singleton(
            GuestGroupRepositoryInterface::class,
            GuestGroupRepository::class
        );

        $this->app->singleton(
            EInvitationRepositoryInterface::class,
            EInvitationRepository::class
        );
    }

    public function provides()
    {
        return [
            ProjectRepositoryInterface::class,
            GuestRepositoryInterface::class,
            GuestGroupRepositoryInterface::class,
            EInvitationRepositoryInterface::class,
        ];
    }
}
