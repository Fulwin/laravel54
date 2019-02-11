<?php

namespace App\Models;

class Department extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
