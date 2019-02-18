<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;
use Auth;

class User extends Authenticatable
{
    use Notifiable {
        notify as protected laravelNotify;
    }

    protected $guarded = ['post_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notify($instance)
    {
        // 如果要通知的是当前用户，就不必通知了
        if ($this->id == Auth::id()) return;

        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }

    /**
     * 将用户的消息标记为已读
     */
    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }

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

    /**
     * 忽略掉管理员
     *
     * @param $query
     * @return mixed
     */
    public function scopeIgnoreAdmin($query)
    {
        return $query->where('is_admin', '<>', 1);
    }

    /**
     * 过滤非正常状态用户
     *
     * @param $query
     * @return mixed
     */
    public function scopeFilterAbnormalUsers($query)
    {
        return $query->where('status', '>', 0);
    }

    /**
     * 忽略掉自己
     *
     * @param $query
     * @return mixed
     */
    public function scopeIgnoreSelf($query)
    {
        return $query->where('id', '<>', Auth::id());
    }

    /**
     * 部门
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * 级别
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo\
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * 职位
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'user_post');
    }

    /**
     * 汇报关系
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo(User::class, 'report_id');
    }

    /**
     * 生成头像
     *
     * @param string $size 图像尺寸
     * @return string
     */
    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    /**
     * 重置密码邮件通知
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * 是否是作者
     *
     * @param $model
     * @return bool
     */
    public function isAuthorOf($model)
    {
        return $this->id === $model->user_id;
    }
}
