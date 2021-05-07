<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Char extends Model
{
    protected $connection = 'mysql_gamedata';
//    protected $connection = 'sqlsrv_gamedata';
    protected $table = 'chars';
//    protected $table = 'dbo.Chars';
    protected $primaryKey = 'CharID';
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }
}
