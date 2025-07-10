@extends('layouts.app')

@section('content')
<a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Create Post</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <h3>{{ $post->title }}</h3>
            <p>{{ Str::limit($post->content, 100) }}</p>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" width="200">
            @endif
            <br>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">View</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
            </form>
        </div>
    </div>
@endforeach
{{ $posts->links() }}
@endsection
