<?php

namespace App\Observers;

use App\Models\Website;
use Illuminate\Support\Facades\Cache;

class WebisteObserver
{
    /**
     * Handle the Website "created" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function created(Website $website)
    {
        Cache::forget('footer_image');

    }

    /**
     * Handle the Website "updated" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function updated(Website $website)
    {
        Cache::forget('footer_image');

    }

    /**
     * Handle the Website "deleted" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function deleted(Website $website)
    {
        //
    }

    /**
     * Handle the Website "restored" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function restored(Website $website)
    {
        //
    }

    /**
     * Handle the Website "force deleted" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function forceDeleted(Website $website)
    {
        //
    }
}
