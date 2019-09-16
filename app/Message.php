<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'from','to','message','read',
    ];


    public function UserFrom()
    {
        return $this->hasOne('App\User','id','from')->select('id','name');
    }
    public function UserTo()
    {
        return $this->hasOne('App\User','id','to')->select('id','name');

    }
}
