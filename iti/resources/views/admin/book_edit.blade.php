@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">Edit Book</h1>
        <form action="{{ url('book', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title" class="text-info">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ $book->title }}" required>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description" class="text-info">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ $book->description }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="author" class="text-info">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                    name="author" value="{{ $book->author }}" required>
                @error('author')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Book</button>
            <a href="{{ url('book') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
@endsection
