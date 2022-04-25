@extends('layouts.app')

@section('content')
<div class="container">


    <div class="column is-8 is-offset-2">
        <a style=" display: flex;justify-content: flex-end;" href="{{ route('home') }}">
            Go Home
        </a> <br>
        <div class="panel">
            <div class="panel-heading">
                List of all Friends. Your User Id - {{$auth_user_id}}
            </div>
            @forelse ($friends as $friend)
            <a href="{{ route('chat.show', $friend->id) }}" class="panel-block" style="justify-content: space-between;">
                <div>{{ $friend->name }}</div>
                <online-user v-bind:friend="{{ $friend }}" v-bind:onlineusers="onlineUsers"></online-user>
            </a>
            @empty
            <div class="panel-block">
                You don't have any friends
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection