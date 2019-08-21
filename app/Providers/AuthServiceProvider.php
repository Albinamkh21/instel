<?php

namespace Corp\Providers;

use Corp\Policies\MenusPolicy;
use Corp\Policies\PermissionPolicy;
use Corp\Policies\ArticlePolicy;
use Corp\Policies\UserPolicy;
use Corp\Policies\RolePolicy;
use Corp\Policies\PortfolioPolicy;
use Corp\Policies\TeamPolicy;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


use Corp\Menu;
use Corp\Article;
use Corp\Permission;
use Corp\User;
use Corp\Role;
use Corp\Portfolio;
use Corp\Team;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Portfolio::class => PortfolioPolicy::class,
        Permission::class => PermissionPolicy::class,
        Menu::class => MenusPolicy::class,
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Team::class => TeamPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     * @return void
     */
    public function boot()
    {
       $this->registerPolicies();

        Gate::define('VIEW_ADMIN', function ($user) {
           return $user->canDo('VIEW_ADMIN');
        });
        Gate::define('VIEW_ADMIN_ARTICLES', function ($user) {
            return $user->canDo('VIEW_ADMIN_ARTICLES');
        });
        Gate::define('EDIT_USERS', function ($user) {
            return $user->canDo('EDIT_USERS');
        });
        Gate::define('VIEW_ADMIN_MENU', function ($user) {
            return $user->canDo('VIEW_ADMIN_MENU');
        });
        Gate::define('VIEW_ADMIN_PORTFOLIOS', function ($user) {
            return $user->canDo('VIEW_ADMIN_PORTFOLIOS');
        });

        //
    }
}
