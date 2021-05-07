<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'mysql_userdata';
//    protected $connection = 'sqlsrv_userdata';
    protected $table = 'users_master';
//    protected $table = 'dbo.Users_Master';
    protected $primaryKey = 'UserUID';
    protected $guarded = [];
    public $timestamps = false;
    protected $appends = [
        'email', 'user_name'
    ];

    public function userDetail()
    {
        return $this->belongsTo(UserDetail::class, 'UserID', 'UserID');
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
}
