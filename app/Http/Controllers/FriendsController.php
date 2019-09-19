<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSendInvitationRequest;
use App\Invitation;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class FriendsController extends Controller
{

    private $user, $input,$message;

    public function add(UserSendInvitationRequest $request)
    {
        $this->input = $request->all();
        $this->message = new MessageBag();
        if ($this->user = User::select('id')->where('email', $this->input['email'])->first()) {
            if($this->user['id']!==Auth::id()) {
                if (!Invitation::where('from', Auth::id())->where('to', $this->user['id'])->count()) {
                    DB::transaction(function () {
                        Invitation::newInvitation(Auth::id(), $this->user['id']);
                        Message::newMessage(Auth::id(), $this->user['id'], $this->input['message']);
                        $this->message->add('success', __('messages.invitation.success'));
                    });
                } else $this->message->add('error', __('messages.invitation.error.user.was'));
            }else $this->message->add('error', __('messages.invitation.error.user.yourSelf'));
        } else $this->message->add('error', __('messages.invitation.error.user.notExist'));


        return  $this->message->jsonSerialize();
    }
    public function accept()
    {
        #TODO AKCEPTOWANIE ZAPROSZENIA DO ZNAJOMYCH
    }
}
