<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\MainSlider;
use App\Models\Package;
use App\Models\Website;
use App\Observers\BlogObserver;
use App\Observers\MainSliderObserver;
use App\Observers\PackageObserver;
use App\Observers\WebisteObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Package::observe(PackageObserver::class);
        Blog::observe(BlogObserver::class);
        MainSlider::observe(MainSliderObserver::class);
        Website::observe(WebisteObserver::class);

    }
}
