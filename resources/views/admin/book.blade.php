@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">Books Dashboard</h1>

        <div class="text-right mb-3">
            <a href="{{ route('book.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Create New Book
            </a>
        </div>

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

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-info">ID</th>
                    <th class="text-info" style="width: 150px;">Title</th>
                    <th class="text-info" style="width: 310px;">Description</th>
                    <th class="text-info">Author</th>
                    <th class="text-info">User ID</th>
                    <th class="text-info" style="width:
                        150px;">Created At</th>
                    <th class="text-info" style="width: 150px;">Updated At</th>
                    <th class="text-info" style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->user_id ? $book->user_id : 'NULL' }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->updated_at }}</td>
                        <td>
                            <a href="book/{{ $book->id }}" class="text-primary">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="book/{{ $book->id }}/edit" class="text-warning mx-2">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="book/{{ $book->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0"
                                    onclick="return confirm('Are you sure you want to delete this book?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $books->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
