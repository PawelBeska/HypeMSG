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
        #TODO wiadomości => lang
        $this->input = $request->all();
        $this->message = new MessageBag();
        if ($this->user = User::select('id')->where('email', $this->input['email'])->first()) {
            if($this->user['id']!==Auth::id()) {
                if (!Invitation::where('from', Auth::id())->where('to', $this->user['id'])->count()) {
                    DB::transaction(function () {
                        Invitation::newInvitation(Auth::id(), $this->user['id']);
                        Message::newMessage(Auth::id(), $this->user['id'], $this->input['message']);
                        $this->message->add('success', 'Pomyślnie wysłano zaproszenie');
                    });
                } else $this->message->add('error', 'Wysłałeś już zaproszenie do tego użytkownika!');
            }else $this->message->add('error', 'Nie możesz wysłać zaproszenia do samego siebie!');
        } else $this->message->add('error', 'Taki użytkownik nie istnieje!');


        return  $this->message->jsonSerialize();
    }
    public function accept()
    {
        #TODO AKCEPTOWANIE ZAPROSZENIA DO ZNAJOMYCH
    }
}
