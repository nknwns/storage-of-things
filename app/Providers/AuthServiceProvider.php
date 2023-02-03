<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Archive;
use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user) {
            if ($user->role_id == 1) {
                return true;
            }
        });

        Gate::define('create-place', function (User $user) {
            return $user->role_id == 3 ?
                Response::allow() :
                Response::deny('warning');
        });

        Gate::define('update-thing', function (User $user, Thing $thing) {
            return $user->id == $thing->owner_id ?
                Response::allow() :
                Response::deny('warning');
        });

        Gate::define('update-place', function (User $user, Place $place) {
            return $user->id == $place->author_id ?
                Response::allow() :
                Response::deny('warning');
        });

        Gate::define('update-archive', function (User $user, Archive $archive) {
            return $user->id == $archive->author_id ?
                Response::allow() :
                Response::deny('warning');
        });
    }
}
