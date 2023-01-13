<?php

namespace App\Providers;

use Hammerstone\Refine\Conditions\Clause;
use Hammerstone\Refine\Frontend\Vue2Frontend;
use Hammerstone\Refine\Stabilizers\CacheStabilizer;
use Hammerstone\Refine\Stabilizers\HybridStabilizer;
use Hammerstone\Refine\Stabilizers\SessionStabilizer;
use Hammerstone\Refine\Stabilizers\UrlEncodedStabilizer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Hammerstone\Refine\Conditions\DateCondition;
use Hammerstone\Refine\Filter;
use Hammerstone\Refine\Stabilizers\DatabaseStabilizer;

class RefineServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // Register all of your filters here. Setting up this map will
        // disassociate the filter classes from their serialized state,
        // allowing you to rename the classes in the future without
        // invalidating all of your outstanding stable filter ids.
        // https://hammerstone.dev/refine/laravel/docs/main/filters/registering
        Filter::register([
            'user' => \App\Filters\UserFilter::class
        ]);

        Filter::registerStabilizers([
            // CacheStabilizer::class,
            // DatabaseStabilizer::class,
            // HybridStabilizer::class,
            // SessionStabilizer::class,
            // UrlEncodedStabilizer::class,
        ]);

        // If you'd like to automatically stabilize all of your filters,
        // you can pass a stabilizer class here. This will append a
        // `stable_id` key to every filter->toArray() call.
        // https://hammerstone.dev/refine/laravel/docs/main/stabilizers/overview#using-automatic-stabilization
        // Filter::setDefaultStabilizer(DatabaseStabilizer::class);

        // If you want to set a default timezone for all of the
        // DateConditions, this is a good place to do so.
        // https://hammerstone.dev/refine/laravel/docs/main/condition-types/date#timezones
        // DateCondition::$defaultUserTimezone = function () {
        //     return optional(Auth::user())->timezone_id ?? 'America/Chicago';
        // };
    }
}
