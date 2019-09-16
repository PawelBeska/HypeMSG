<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserGetMessagesRequest;
use App\Http\Requests\UserSendInvitationRequest;
use App\Http\Requests\UserSendMessageRequest;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function chat_header(Request $request)
    {

        $input = $request->all();

        return User::where('id','=',$input['id'])->select('id','name','email')->get()->jsonSerialize();

    }
    public function chat_body(Request $request)
    {
        $input = $request->all();
        return Message::with('UserFrom','UserTo')->where('from','=',auth()->id())->where('to','=',$input['id'])->orWhere('from','=',$input['id'])->where('to','=',auth()->id())->get()->jsonSerialize();

    }
    public function chat_footer()
    {

    }
    public function get_messages(UserGetMessagesRequest $request)
    {
        $input = $request->all();
        return Message::with('UserFrom','UserTo')->where('from','=',auth()->id())->where('to','=',$input['id'])->orWhere('from','=',$input['id'])->where('to','=',auth()->id())->get()->jsonSerialize();


    }
    public function send_message(UserSendMessageRequest $request)
    {
        $input = $request->all();
        Message::create(['from'=>auth()->id(),'to'=>$input['to'],'message'=>$input['message']]);
        return null;
    }
    public function send_invitation(UserSendInvitationRequest $request)
    {
        $input = $request->all();

    }

}
