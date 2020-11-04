<?php

namespace App\Observers\Admin;

use App\Models\Admin\Slider;
use Illuminate\Support\Facades\Storage;

class SliderObserver
{
    /**
     * Handle the slider "created" event.
     *
     * @param  \App\Models\Admin\Slider  $slider
     * @return void
     */
    public function created(Slider $slider)
    {
        //
    }

    /**
     * Handle the slider "updated" event.
     *
     * @param  \App\Models\Admin\Slider  $slider
     * @return void
     */
    public function updated(Slider $slider)
    {
        //
    }

    /**
     * Handle the slider "deleted" event.
     *
     * @param  \App\Models\Admin\Slider  $slider
     * @return void
     */
    public function deleted(Slider $slider)
    {
        //
    }

	/**
	 * @param Slider $slider
	 */
    public function deleting(Slider $slider)
	{
		if (!is_null($slider->img) && $slider->img)
		{
			Storage::disk('public')->delete($slider->img);
		}
	}

    /**
     * Handle the slider "restored" event.
     *
     * @param  \App\Models\Admin\Slider  $slider
     * @return void
     */
    public function restored(Slider $slider)
    {
        //
    }

    /**
     * Handle the slider "force deleted" event.
     *
     * @param  \App\Models\Admin\Slider  $slider
     * @return void
     */
    public function forceDeleted(Slider $slider)
    {
        //
    }
}
