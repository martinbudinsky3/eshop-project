<?php

namespace App\Providers;

use App\Models\Voting;
use App\Policies\VotingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\CartItem;
use App\Policies\CartItemPolicy;
use App\Models\Order;
use App\Policies\OrderPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        CartItem::class => CartItemPolicy::class,
        Order::class => OrderPolicy::class,
        Voting::class => VotingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('administrate', function ($user) {
            return $user->isAdmin();
        });
    }
}
