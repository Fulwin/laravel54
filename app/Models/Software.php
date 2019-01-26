<?php

namespace App\Models;

class Software extends Model
{
    protected $fillable = ['type', 'no', 'name', 'mcu', 'version', 'user_id', 'describe'];
}
