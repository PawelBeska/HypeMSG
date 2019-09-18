<?php

namespace App;

use http\Exception;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'from', 'to', 'message', 'read',
    ];

    public static function newMessage($from, $to, $message)
    {
        self::create(['from' => $from, 'to' => $to, 'message' => $message]);
    }


    public function UserFrom()
    {
        return $this->hasOne('App\User', 'id', 'from')->select('id', 'name');
    }

    public function UserTo()
    {
        return $this->hasOne('App\User', 'id', 'to')->select('id', 'name');

    }
}
