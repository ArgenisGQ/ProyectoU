<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function author(?User $user, Activity $activity){
        if ($user->id == $activity->user_id) {
            return true;
        } else {
            return false;
        }

    }

    public function published(User $user, Activity $activity){
        if ($activity->status == 2) {
            return true;
        } else {
            return false;
        }

    }
}
