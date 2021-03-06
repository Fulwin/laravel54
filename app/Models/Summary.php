<?php

namespace App\Models;

use App\Models\Model;

class Summary extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setCcAttribute($value)
    {
        $this->attributes['cc'] = implode(',', $value);
    }

    public function getCcAttribute($value)
    {
        return explode(',', $value);
    }

    public function getTypeTextAttribute()
    {
        $type = $this->attributes['type'];

        $types = [
            'common' => '通用模板',
            'resource' => '资源模板'
        ];

        return $types[$type];
    }
}
