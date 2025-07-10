@extends('layouts.app')

@section('content')
<h2>Create New Post</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Post Title</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Post Content</label>
        <textarea name="content" class="form-control" id="content" rows="5" required>{{ old('content') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Upload Image (optional)</label>
        <input type="file" name="image" class="form-control" id="image" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Create Post</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
