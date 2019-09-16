<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Chats()
    {
        $authId = auth()->id();

        $users =
            User::query()->whereHas('messages_from', function (Builder $query) use ($authId) {
                $query->where('from', $authId)
                    ->orWhere('to', $authId);
            })->where('id', '!=', $authId)
            ->orwhereHas('messages_to', function (Builder $query) use ($authId) {
            $query->where('from', $authId)
                ->orWhere('to', $authId);
        })
            ->where('id', '!=', $authId)
            ->select()
            ->selectSub(function (QueryBuilder $query) use ($authId) {
                $query->from('messages')
                    ->where(function (QueryBuilder $query) use ($authId) {
                        $query->whereColumn('messages.from', 'users.id')
                            ->where('messages.to', $authId);
                    })
                    ->orWhere(function (QueryBuilder $query) use ($authId) {
                        $query->whereColumn('messages.to', 'users.id')
                            ->where('messages.from', $authId);
                    })
                    ->orderByDesc('created_at')
                    ->limit(1)
                    ->select('message');
            }, 'message')
            ->get();
        return $users->jsonSerialize();
    }

}
