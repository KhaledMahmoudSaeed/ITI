@extends('layouts.app')

@section('content')
    {{--  it always by default to display profile for the current authenticated user unless the user is admin so it will display all users but without edit them --}}
    @php
        $placeholder = Auth::user();
    @endphp
    @can('admin.access')
        @php
            $placeholder = $user;
        @endphp
    @endcan


    <div class="container">
        <h1 class="text-center mb-4 text-info">User Profile</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-info">
                    <div class="card-header bg-info text-white">Profile Information</div>
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            @if ($placeholder->img)
                                <img src="{{ asset('storage/images/' . $placeholder->img) }}" alt="Profile Picture"
                                    class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Default Profile Picture"
                                    class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                            @endif
                        </div>

                        <div class="mb-3">
                            <strong class="text-info">Name:</strong> <span
                                class="text-muted">{{ $placeholder->name }}</span>
                        </div>

                        <div class="mb-3">
                            <strong class="text-info">Email:</strong> <span
                                class="text-muted">{{ $placeholder->email }}</span>
                        </div>

                        <div class="mb-3">
                            <strong class="text-info">Phone:</strong> <span
                                class="text-muted">{{ $placeholder->phone ?? 'N/A' }}</span>
                        </div>

                        <div class="mb-3">
                            <strong class="text-info">Country:</strong> <span
                                class="text-muted">{{ $placeholder->country ?? 'N/A' }}</span>
                        </div>

                        <div class="mb-3">
                            <strong class="text-info">Role:</strong> <span
                                class="text-muted">{{ $placeholder->role }}</span>

                        </div>

                        <div class="mb-3">
                            <strong class="text-info">Created At:</strong> <span
                                class="text-muted">{{ $placeholder->created_at->format('Y-m-d H:i:s') }}</span>
                        </div>

                        <div class="mb-3">
                            <strong class="text-info">Books You have :</strong>
                            <div class="mt-2">
                                @foreach ($placeholder->books as $book)
                                    <div class="d-inline-block p-2 mb-2 bg-info border rounded shadow-sm me-2">
                                        <span class="text-dark fw-bold">{{ $book->title }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="text-center">

                            {{-- these under 4 lines because admin can view all students data but I don't want they to edit student profile so I always check
                            if id for authorization user is the same with the ..... note $user works with admins and users because I pass it in each case that is the Authorization makes a AAmazing Feeling ^_^
                            I pass $user object (which represents the authenticated user, either admin or student --}}
                            @if (Auth::user()->id == $user->id)
                                <a href="{{ route('user.edit', Auth::user()->id) }}" class="btn btn-warning">Edit
                                    Profile</a>
                            @endif

                            @can('admin.access')
                                <a href="/userdashboard" class="btn btn-danger">Back</a>
                            @else
                                <a href="/books" class="btn btn-danger">Back</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
