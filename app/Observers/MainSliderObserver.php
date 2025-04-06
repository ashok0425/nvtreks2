<?php

namespace App\Observers;

use App\Models\MainSlider;
use Illuminate\Support\Facades\Cache;

class MainSliderObserver
{
    /**
     * Handle the MainSlider "created" event.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return void
     */
    public function created(MainSlider $mainSlider)
    {
        Cache::forget('banners');

    }

    /**
     * Handle the MainSlider "updated" event.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return void
     */
    public function updated(MainSlider $mainSlider)
    {
        Cache::forget('banners');


    }

    /**
     * Handle the MainSlider "deleted" event.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return void
     */
    public function deleted(MainSlider $mainSlider)
    {
        //
    }

    /**
     * Handle the MainSlider "restored" event.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return void
     */
    public function restored(MainSlider $mainSlider)
    {
        //
    }

    /**
     * Handle the MainSlider "force deleted" event.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return void
     */
    public function forceDeleted(MainSlider $mainSlider)
    {
        //
    }
}
