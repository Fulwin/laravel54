<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['post_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        // 全局作用域
        /*static::addGlobalScope('is_admin', function (Builder $builder) {
            $builder->where('is_admin', '<>', 1);
        });
        static::addGlobalScope('status', function (Builder $builder) {
            $builder->where('status', '>', 0);
        });*/

        // user被创建之前生成activation_token
        static::creating(function ($user) {
            $user->activation_token = str_random(30);
        });
    }

    public function scopeIgnoreAdmin($query)
    {
        return $query->where('is_admin', '<>', 1);
    }

    public function scopeFilterAbnormalUsers($query)
    {
        return $query->where('status', '>', 0);
    }

    public function scopeIgnoreSelf($query)
    {
        return $query->where('id', '<>', Auth::id());
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'user_post');
    }

    public function report()
    {
        return $this->belongsTo(User::class, 'report_id');
    }

    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function isAuthorOf($model)
    {
        return $this->id === $model->user_id;
    }
}
