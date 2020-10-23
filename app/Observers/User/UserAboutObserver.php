<?php

namespace App\Observers\User;

use App\Models\User\ShoppingHistory;
use App\Models\User\UserAbout;

class UserAboutObserver
{
    /**
     * Handle the user about "created" event.
     *
     * @param  \App\Models\User\UserAbout  $userAbout
     * @return void
     */
    public function created(UserAbout $userAbout)
    {

//    	dd('observer created');
    }

    /**
     * Handle the user about "updated" event.
     *
     * @param  \App\Models\User\UserAbout  $userAbout
     * @return void
     */


    public function updated(UserAbout $userAbout)
    {
    	//
//		ShoppingHistory::create([
//			'user_id' => $userAbout->userid,
//			'catalog_id' => $userAbout->catalogId,
//		]);
    }

    /**
     * Handle the user about "deleted" event.
     *
     * @param  \App\Models\User\UserAbout  $userAbout
     * @return void
     */
    public function deleted(UserAbout $userAbout)
    {
        //
    }

    /**
     * Handle the user about "restored" event.
     *
     * @param  \App\Models\User\UserAbout  $userAbout
     * @return void
     */
    public function restored(UserAbout $userAbout)
    {
        //
    }

    /**
     * Handle the user about "force deleted" event.
     *
     * @param  \App\Models\User\UserAbout  $userAbout
     * @return void
     */
    public function forceDeleted(UserAbout $userAbout)
    {
        //
    }
}
