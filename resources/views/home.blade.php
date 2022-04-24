@extends('layouts.app')





@section('content')
@component('components.full-page-section')
@component('components.card')
@slot('title')
{{ config('app.name') }}
@endslot

<div class="content">
    <p>
        Welcome to <b>{{ config('app.name') }}</b>
    </p>
    <p>
        You are logged in
    </p>




    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type='submit'>Logout</button>
    </form>
    <a style=" display: flex;justify-content: flex-end;" href="{{ route('friends') }}">
        All Friends
    </a>
    <a style=" display: flex;justify-content: flex-end;" href="{{ route('chat.index') }}">
        Chat
    </a>
</div>
@endcomponent
@endcomponent
@endsection