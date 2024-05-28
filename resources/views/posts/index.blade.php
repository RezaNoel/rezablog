@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
        @endauth
        <div class="mt-4">
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
                        <p>{{ $post->content }}</p>
                        @auth
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
