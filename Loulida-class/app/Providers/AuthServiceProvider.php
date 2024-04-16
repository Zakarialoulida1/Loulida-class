<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Cours;
use App\Models\CoursFile;
use App\Policies\ExerciseFilePolicy;
use Illuminate\Support\Facades\Gate ;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\ExerciseFile;
use App\Policies\CoursFilePolicy;
use App\Policies\CoursPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
     ExerciseFile::class => ExerciseFilePolicy::class,
     Cours::class =>CoursPolicy::class,
     CoursFile::class => CoursFilePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
  

     public function boot()
     {
         $this->registerPolicies();
 
   }
}
