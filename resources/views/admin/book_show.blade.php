@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">Book Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">
                    Book Title: <span class="text-info"><strong>{{ $book->title }}</strong></span></h5>
                <p class="card-text"><strong>Description:</strong> {{ $book->description }}</p>
                <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                <p class="card-text"><strong>User ID:</strong> {{ $book->user_id ? $book->user_id : 'NULL' }}</p>
                <p class="card-text"><strong>Created At:</strong> {{ $book->created_at->format('d-M-Y') }}</p>
                <p class="card-text"><strong>Updated At:</strong> {{ $book->updated_at->format('d-M-Y') }}</p>

                <a href="{{ url('book') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
