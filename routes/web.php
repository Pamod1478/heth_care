<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Patient;

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
        return redirect()->route('give.medicine'); // Changed to give-medicine
    }

    return back()->withErrors([
        'name' => 'The provided credentials do not match our records.',
    ]);
});

// Dashboard routes with middleware
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/give-medicine', function () {
        return view('Content.give_medicine');
    })->name('give.medicine');

    Route::get('/view-patients', function () {
        return view('Content.view_patients');
    })->name('view.patients');

    Route::get('/total-income', function () {
        return view('Content.total_income');
    })->name('total.income');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::post('/patients', [App\Http\Controllers\PatientController::class, 'store'])->name('patients.store');

Route::get('/api/patient-by-mobile', function (Request $request) {
    $mobile = $request->query('mobile_number');
    $patients = \App\Models\Patient::where('mobile_number', $mobile)->get();
    return response()->json($patients);
})->middleware('auth');

Route::get('/add-medicine/{patient}', [App\Http\Controllers\PatientController::class, 'showAddMedicine'])->name('add.medicine');

Route::post('/add-medicine/{patient}', [App\Http\Controllers\PatientController::class, 'storeMedicine'])->name('add.medicine.save');