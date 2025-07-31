@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('role'))
            <div class="alert alert-success">
                {{ session('role') }}
            </div>
        @endif
        <h1 class="text-center text-info my-4">User Dashboard</h1>
        {{--  Search Bar --}}
        <form action="/userdashboard" class="d-flex mb-4">
            <input type="search" id="gsearch" name="q" class="form-control me-2" placeholder="Search User by ID"
                aria-label="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <a href="/userdashboard" class="btn btn-secondary mb-3">Back</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-info">ID</th>
                    <th class="text-info">Name</th>
                    <th class="text-info">Email</th>
                    <th class="text-info">Gender</th>
                    <th class="text-info">Phone</th>
                    <th class="text-info">Country</th>
                    <th class="text-info">Role</th>
                    <th class="text-info">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($user as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->role }}
                            {{--  To Promote a Student --}}
                            @if (Auth::user()->id !== $user->id && $user->role !== 'admin')
                                <form action="/userdashboard/{{ $user->id }}/promote" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success" style="padding: 1px;"
                                        onclick="return confirm('Are you sure you want to Promote this user?');">
                                        Promote
                                    </button>
                                </form>
                            @endif
                            {{--  To demote a admin .. that is not allow to other users to demote the creator of website with id =1 --}}

                            @if (Auth::user()->id === 1 && $user->id > 1 && $user->role === 'admin')
                                <form action="/userdashboard/{{ $user->id }}/demote" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger" style="padding: 1px;"
                                        onclick="return confirm('Are you sure you want to Promote this user?');">
                                        Demote
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}" class="text-primary">
                                <i class="fas fa-eye"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
