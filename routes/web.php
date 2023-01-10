<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy']);

Route::middleware('auth')->group(function (){
    Route::get('/', function () {
        return Inertia::render('Home', [
            'time' => now()->toTimeString()
        ]);
    });

    Route::get('/user', function () {
        return Inertia::render('User/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user)
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    });

    Route::get('/user/create', function () {
        return Inertia::render('User/Create');
    })->can('create', 'App\Models\User');

    Route::post('/user', function() {
        $attr = Request::validate([
            'name' => 'required|string|min:3|',
            'email' => 'required|string|min:3|',
            'password' => 'required|string|min:3|',
        ]);

        User::create($attr);

        return redirect('/user');
    });

    Route::get('/setting', function () {
        return Inertia::render('Setting');
    });
});
