<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Show login page at /login
Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

// Redirect root to /login
Route::get('/', function () {
    return redirect('/login');
});

// Handle login POST
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'name' => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);

    $user = User::where('name', $credentials['name'])->first();

    if ($user && \Hash::check($credentials['password'], $user->password)) {
        Auth::login($user);
        return redirect('/dashboard');
    }

    return back()->withErrors([
        'name' => 'The provided credentials do not match our records.',
    ]);
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');