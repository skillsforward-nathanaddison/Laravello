@extends('layout')

@section('nav')

@endsection

@section('body')
    @foreach($users as $user)
        <hr>
        <article>
            <h1>
                Username: {{ $user->username }}
            </h1>

            <p>
                Full name: {{ $user->forename }} {{ $user->surname }}
            </p>
        </article>
        <hr>
    @endforeach
@endsection
