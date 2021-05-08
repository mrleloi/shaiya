<?php

namespace App;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, CanResetPassword;

//    protected $connection = 'mysql_userdata';
    protected $connection = 'sqlsrv_userdata';
//    protected $table = 'users_master';
    protected $table = 'dbo.Users_Master';
    protected $primaryKey = 'UserUID';
    protected $guarded = [];
    public $timestamps = false;

    protected $appends = ['userDetail'];

    public function getUserDetailAttribute()
    {
        return $this;
    }

    public function getAuthPassword()
    {
        return $this->Pw;
    }

    public static function username()
    {
        return 'UserID';
    }

    public static function password()
    {
        return 'Pw';
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
