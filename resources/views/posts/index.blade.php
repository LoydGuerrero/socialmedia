@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <textarea name="content" required></textarea>
        <button type="submit">Post</button>
    </form>

    @foreach($posts as $post)
        <div class="post">
            <p>{{ $post->content }}</p>
            <small>By {{ $post->user->name }}</small>
            <form action="{{ route('likes.store', $post) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Like</button>
            </form>
            <form action="{{ route('likes.destroy', $post) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Unlike</button>
            </form>
            <div>
                @foreach($post->comments as $comment)
                    <p>{{ $comment->content }} - <small>By {{ $comment->user->name }}</small></p>
                @endforeach
                <form action="{{ route('comments.store', $post) }}" method="POST">
                    @csrf
                    <input type="text" name="content" required>
                    <button type="submit">Comment</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
