@extends('admin.layoutadmin.master')
@section('title', 'edit blog ')

@section('content')
<h1>Edit Blog</h1>
<form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}">
    </div>
    <div>
        <label for="content">Content:</label>
        <textarea name="content" id="editor">{{ old('content', $blog->content) }}</textarea>
    </div>
    <div>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="{{ old('author', $blog->author) }}">
    </div>
    <button type="submit">Update Blog</button>
</form>

<!-- CKEditor 5 Script -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
