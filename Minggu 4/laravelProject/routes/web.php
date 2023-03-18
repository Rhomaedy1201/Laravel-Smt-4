<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Middleware\CheckAge;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['namespace' => 'Frontend'], function () {
//     Route::resource('/home', HomeController::class);
// });

Route::resource('/home', HomeController::class);

Route::resource('/dashboard', DashboardController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Middleware

// Route::get('/admin/profile', function () {
//     // 
// })->middleware('auth');

Route::get('/', function () {
    // 
})->middleware('first', 'second');

Route::get('admin/profile', function () {
    // 
})->middleware(CheckAge::class);


// Middleware Group
Route::get('/', function () {
    // 
})->middleware('web');

// Route::get(['middleware' => ['web']], function () {
//     // 
// });

// Route::middleware(['web' => ['subscribed']])->group(function () {
//     // 
// });

Route::put('post/{id}', function ($id) {
    // 
})->middleware('role:editor');