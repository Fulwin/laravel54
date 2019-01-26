<?php

namespace App\Models;

use App\Models\Model;

class Summary extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
