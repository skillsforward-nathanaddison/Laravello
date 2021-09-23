@extends('Component.layout')

@section('body')
    <div>
        @if($user->userInformation->avatar)
            <img class="profile-image" src="/user/{{ $user->id }}/avatar/{{ $user->userInformation->avatar }}">
        @else
            <img class="profile-image" src="/img/default_image.jpg">
        @endif


        <label>{{ $user->username }}</label><br>

            @if ($user->recent_activity)
                Last active: {{ $user->recent_activity }}<br>
            @endif
    </div>
@endsection
