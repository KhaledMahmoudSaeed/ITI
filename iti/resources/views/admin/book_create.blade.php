@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">Create New Book</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('book.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title" class="text-info">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter book title"
                    required>
            </div>

            <div class="form-group">
                <label for="description" class="text-info">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter book description"
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="author" class="text-info">Author</label>
                <input type="text" name="author" id="author" class="form-control" placeholder="Enter author's name"
                    required>
            </div>

            <div class="form-group"><br>
                <button type="submit" class="btn btn-primary">Create Book</button>
                <a href="{{ route('book.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
