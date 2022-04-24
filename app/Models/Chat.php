<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\BroadcastChat;

class Chat extends Model
{
    use HasFactory;


    protected $dispatchesEvents = [
        'created' => BroadcastChat::class
    ];

    protected $fillable = ['user_id', 'friend_id', 'chat'];
}
