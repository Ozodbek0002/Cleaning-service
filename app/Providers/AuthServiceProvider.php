<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Post::class =>PostPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-post', function (User $user,Role $role) {
            return $user->hasRole($role->name);
        });



//        Gate::define('delete-post', function (User $user, Post $post) {
//            return $user->id === $post->user_id;
//        });

    }
}
