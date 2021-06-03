@extends('layout')

@section('nav')

@endsection

@section('body')
    <article>
            <a href="<?php resource_path() ?>/post/<?= $post->id ?>/edit">Edit this post</a>
            <a href="<?php resource_path() ?>/post/<?= $post->id ?>/delete">Delete this post</a>
        <h1>
            {{ $post->title }}
        </h1>

        <p>
            <strong>Post author:</strong> {{ $post->author->name }} | <strong>Post category:</strong><a href="/categories/{{ $post->category->id}}"> {{ $post->category->title}}</a>
        </p>

        <h3>
            {{ $post->excerpt }}
        </h3>

        <p class="center">
            {!! $post->body !!}
        </p>

        @if($post->img) <img class="center" src="/uploads/{{ $post->img }}">@endif
    </article>
    <br>
    <form action="/add/save/comment" method="POST">
        @csrf
        <label for="comment">Add a comment</label>
        <textarea id="comment" name="comment" cols="50" rows="8"></textarea><br><br>
        @isset($post) <input type="hidden" name="post_id" value="<?= $post->id ?>"> @endisset
        <input type="submit" value="Submit">
    </form>
    @foreach($post->comments as $comment)
    <div class="comment">
        <p>
            Comment #{{$comment->id}}: {{ $comment->body }} <br>
            <label><strong>Comment made by:</strong> {{ $comment->user->name }}</label>
        </p>
    </div>
    @endforeach
@endsection

