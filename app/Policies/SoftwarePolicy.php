<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Software;

class SoftwarePolicy extends Policy
{
    public function update(User $user, Software $software)
    {
        // return $software->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Software $software)
    {
        return true;
    }
}
