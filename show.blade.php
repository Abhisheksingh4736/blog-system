@extends('layouts.app')

@section('content')
<h2>{{ $post->title }}</h2>

@if ($post->image)
<div class="mb-3">
    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" width="400">
</div>
@endif

<p>{{ $post->content }}</p>

<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>

<form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
</form>

<a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
@endsection
