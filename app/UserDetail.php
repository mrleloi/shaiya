<?php

namespace App;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserDetail extends Authenticatable
{
    use Notifiable, CanResetPassword;

//    protected $connection = 'mysql_userdata';
    protected $connection = 'sqlsrv_userdata';
//    protected $table = 'users_detail';
    protected $table = 'dbo.Users_Master';
    protected $primaryKey = 'UserUID';
    protected $guarded = [];
    public $timestamps = false;

    protected $appends = ['user'];

    public function getUserAttribute()
    {
        return $this;
    }

    public function setRememberToken($token) {
        return false;
    }

    public function getEmailForPasswordReset()
    {
        return $this->Email;
    }

    public function routeNotificationForMail($notification)
    {
        return $this->Email;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\ResetPasswordNotification($token));
    }
}
