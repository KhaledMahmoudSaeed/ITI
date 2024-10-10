@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-center my-4 display-4 font-weight-bold text-primary">Welcome to LibraryEase</h2>

            @foreach ($books as $book)
                <div class="col-md-3 mb-4">
                    <div class="card text-white" style="background-color: #6c757d; height: 100%;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center" style="font-size: 2rem;">
                                <span class="font-weight-bold text-primary">Book Name: </span>{{ $book->title }}
                            </h5>
                            <p class="card-text flex-grow-1">{{ $book->description }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center" style="height: 70px;">

                                {{--  Mange the Borrow/Lend system .. chech whether the current user is the same one who borrow the book then he can lend it otherwise it show that this book is not avaliable now --}}
                                @if ($book->user_id && Auth::user()->id == $book->user_id)
                                    <form action="/books/Lend/{{ $book->id }}" method="POST"
                                        class="d-flex align-items-center">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-danger mx-2" type="submit" style="height: 50px;">
                                            {{ 'Lend' }}
                                        </button>
                                        <div>
                                            <span class="mx-2">
                                                Borrowed at:<strong style="color: #46c7d8;">
                                                    {{ date_format($book->updated_at, 'd-M') }}</strong>
                                            </span>
                                            <span class="mx-2">
                                                Return at:<strong style="color: #b31e2d;">
                                                    {{ date_format(date_add($book->updated_at, date_interval_create_from_date_string('5 days')), 'd-M') }}</strong>
                                            </span>
                                        </div>
                                    </form>
                                @else
                                    @if (!$book->user_id)
                                        <form action="/books/borrow/{{ Auth::user()->id }}/{{ $book->id }}"
                                            method="POST" class="d-flex align-items-center">
                                            @method('PUT')
                                            @csrf
                                            <button class="btn btn-primary mx-2" type="submit" style="height: 50px;">
                                                {{ 'Available' }}
                                            </button>
                                        </form>
                                    @else
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-dark mx-2" type="button" disabled style="height: 50px;">
                                                {{ 'Not Available' }}
                                            </button>
                                            <div>
                                                <span class="mx-2">
                                                    Borrowed at:<strong style="color: #46c7d8;">
                                                        {{ date_format($book->updated_at, 'd-M') }}</strong>
                                                </span>
                                                <span class="mx-2">
                                                    Return at:<strong style="color: #b31e2d;">
                                                        {{ date_format(date_add($book->updated_at, date_interval_create_from_date_string('5 days')), 'd-M') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div>
                {{--  pagination links  --}}
                {{ $books->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
