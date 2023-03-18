<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/user', [UserController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});

Route::permanentRedirect('/log', '/login');
Route::permanentRedirect('/welcome', '/');

Route::view('/login2', 'login');

// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);



Route::get('user/{name?}', function ($name = null) {
    return $name;
});

Route::get('user2/{name?}', function ($name = 'Jhon') {
    return $name;
});


Route::get('user3/{name}', function ($name) {
    // 
})->where('name', '[A-Za-z]+');

// Route::get('user3/{id}', function ($id) {
//     // 
// })->where('id', '[0-9]');

// Route::get('user/{id}/{name}', function ($id, $name) {
//     // 
// })->where(['id' => '[0-9]+', 'name' => '[a-z]']);

// Rooute::get('user/{id}', function ($id) {

// });



Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');


// Rute pembuatan URL atau pengalihan yang nyaman untuk rute tertentu
Route::get('/user4/profile', function () {
    return "Berhasil Generate URL";
})->name('profile');


Route::middleware(['first', 'second'])->group(function () {
    Route::get(
        '/welcome',
        function () {
            // Uses first & second middleware...
        }
    );

    Route::get(
        '/user/profile',
        function () {
            // Uses first & second middleware...
        }
    );
});


Route::domain('{account}.example.com')->group(function () {
    Route::get(
        '/user7/{id}',
        function (string $account, string $id) {
            // ...
        }
    );
});

use Illuminate\Http\Request;

Route::post('/login', function (Request $request) {
    dd($request);
});

// Rooute::get('search/{id}/profile', function ($id) {
//     // 
// })->name('profile');

// $url = route('profile', ['id' => 1, 'photos' => 'yes']);

// Route::middleware(['first', 'second'])->group(function(){
//     Route::get('/', function(){
//         // 
//     });

//     Route::get('user/profile', function(){
//         // 
//     });

// });

// Route::namespace('Admin')->group(function(){
//     // 
// });

// Route::domain('{account}.myapp.com')->group(function(){
//     Route::get('user/{id}', function($account, $id){
//         // 
//     });
// });

// Route::prefix('admin')->group(function(){
//     Route::get('users', function(){

//     });
// });

// Route::name('admin.')->group(function(){
//     Route::get('users', function(){
//         // 
//     })->name('users');
// });