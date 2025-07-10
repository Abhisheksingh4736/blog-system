@extends('layouts.app')

@section('content')
<h2>Edit Post</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Change Image (optional)</label>
        <input type="file" name="image" class="form-control">
        @if ($post->image)
        <div class="mt-2">
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $post->image) }}" width="200">
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
