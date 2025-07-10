@extends('layouts.app')

@section('content')
<h2>All Posts</h2>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Create Post</a>

@foreach ($posts as $post)
<div class="card mb-3">
    <div class="card-body">
        <h5>{{ $post->title }}</h5>
        @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" width="200">
        @endif
        <p>{{ Str::limit($post->content, 100) }}</p>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</div>
@endforeach

{{ $posts->links() }}
@endsection
