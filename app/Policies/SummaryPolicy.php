<?php

namespace App\Policies;

use App\Models\Summary;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SummaryPolicy
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

    public function destroy(User $user, Summary $summary)
    {
        return $user->id === $summary->user->id;
    }
}
