<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function messages_from(){
        return $this->hasMany('App\Message','from','id');
    }
    public function messages_to(){
        return $this->hasMany('App\Message','to','id');
    }
    public function lastMessage(): HasOne
    {
        return $this->hasOne(Message::class, 'id', 'last_message_id');
    }
    public function getAvatar()
    {
        return $this->avatar?$this->avatar:URL::asset('assets/images/avatar.png');
    }
}