<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\guidance;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function update(User $user, $guidance){
        $guidance = guidance::findOrFail($guidance);
        return $user->id === $guidance->user_id;
    }
}
