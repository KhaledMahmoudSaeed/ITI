<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// Route::get('/books', [HomeController::class, 'index'])->name('home');

// ----------------- Student Routes

// Home page
Route::get('/', function () {
    $books = Book::orderBy('user_id', 'desc')->paginate(12);
    return view("home", ['books' => $books]);
})->middleware('auth');


Route::get('/books', function () {
    $books = Book::orderBy('user_id', 'desc')->paginate(12);
    return view("home", ['books' => $books]);
})->middleware('auth');


// Borrow and Lend books
Route::put('/books/borrow/{id_user}/{id_book}', function ($id_user, $id_book, Book $book) {
    $book = Book::findOrFail($id_book);
    $book->update(
        [
            'user_id' => $id_user
        ],
    );
    return redirect('/books');
});
Route::put('/books/Lend/{id_book}', function ($id_book, Book $book) {
    $book = Book::findOrFail($id_book);
    $book->update(
        [
            'user_id' => NULL
        ],
    );
    return redirect('/books');
});


//Students and Admins profile

Route::get('books/profile/{id}', function ($id) {
    $user = User::findOrFail($id);
    return view('user.profile', ['user' => $user]);
})->name('user.profile');

Route::get('books/profile/edit/{id}', function ($id) {
    $user = User::findOrFail($id);
    return view('user.edit', ['user' => $user]);
})->name('user.edit');

Route::put('books/profile/edit/{id}', function ($id, Request $request) {
    $user = User::findOrFail($id);
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
        'phone' => ['required', 'string', 'max:15', 'unique:users,phone,' . $id],
        'country' => ['required'],
        'img' => ['nullable', 'file', 'mimes:jpg,jpeg,png'],
    ]);
    if ($request->file('img')) {
        $imagePath = $request->file('img');
        $imagePath->storeAs('images', $imagePath->getClientOriginalName(), 'public');
        $user->img = $imagePath->getClientOriginalName();
    }
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'country' => $request->country,
    ]);
    $user->save();
    return view('user.profile', ['user' => $user]);
})->name('user.update');


// ----------------- Admin Routes

// User Dashborad
Route::get('/userdashboard', function (Request $request) {
    $user = User::all();
    if ($request->has('q') && $request->query('q') != '') {
        $user = $user->where('id', $request->get('q', ''));
    };
    return view('admin.student', ['user' => $user]);
})->middleware('can:admin.access')->name('user_dashboard');

// Show Student profile and details
Route::get('/userdashboard/{id}', function ($id) {
    $user = User::findOrFail($id);
    return view('user.profile', ['user' => $user]);
})->name('admin.users.show');

// Promote a Student to be an admin
Route::put('/userdashboard/{id}/promote', function ($id) {
    $user = User::findOrFail($id);
    $user->update([
        'role' => 'admin',
    ]);
    return redirect('/userdashboard')->with('role', 'User has been Promoted');
});

// demote a admin to be an student

Route::put('/userdashboard/{id}/demote', function ($id) {
    $user = User::findOrFail($id);
    $user->update([
        'role' => 'user',
    ]);
    return redirect('/userdashboard')->with('role', 'User has been Demoted');
});

Route::resource('/book', BookController::class)->middleware('can:admin.access');
