<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Auth::user()->friends();
        return view('chat.index')->with(['friends' => $friends, 'auth_user_id' => Auth::user()->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = User::find($id);
        return view('chat.show')->with('friend', $friend);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatRequest  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }


    public function getChat($friend_id)
    {
        $chats = Chat::where(function ($query) use ($friend_id) {
            $query->where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $friend_id);
        })->orWhere(function ($query) use ($friend_id) {
            $query->where('user_id', '=', $friend_id)->where('friend_id', '=', Auth::user()->id);
        })->get();

        return $chats;
    }

    public function sendChat(Request $request)
    {
        Chat::create([
            'user_id' => $request->user_id,
            'friend_id' => $request->friend_id,
            'chat' => $request->chat
        ]);

        return [];
    }
}
