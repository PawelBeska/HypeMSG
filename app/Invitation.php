<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'from','to'
    ];
    protected $table = 'friends_invitations';

    public static function newInvitation($from, $to)
    {
        self::create(['from'=>$from,'to'=>$to]);
    }
    public static function acceptInvitation($id, $to)
    {
        #TODO AKCEPTOWANIE ZAPROSZENIA DO ZNAJOMYCH
    }

}
