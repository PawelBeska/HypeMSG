<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Http\Requests\UserSendInvitationRequest;
use Illuminate\Http\Request;

class FriendsController extends Controller
{

    public function add(UserSendInvitationRequest $request)
    {
        $input = $request->all();
        if(User::where('email',$input['to']))
            Friend::create(['from'=>$input['from'],'to'=>$input['to'],'message'=>$input['message']]);
    }
}
