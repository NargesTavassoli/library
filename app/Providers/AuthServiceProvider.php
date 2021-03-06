<?php

namespace App\Providers;

use App\Models\Book;
use App\Policies\BookPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//         'App\Models\Model' => 'App\Policies\ModelPolicy',
        Book::class => BookPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::before( function ($user){
//            if ($user->type == 'admin') { return true; }
//        });

        Gate::define('delete-button', function ($user , $book){
            if ($book->user_id == $user->id || $user->type == 'admin'){ return true;}
            else{ return false;}
        });

        Gate::define('admin', function ($user){
            if ($user->type == 'admin') { return true; }
        });

    }
}
