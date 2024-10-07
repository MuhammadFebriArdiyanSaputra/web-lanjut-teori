<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
};


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
});

Route::get('user', [UserController::class, 'index']);

Route::get('user/create', [UserController::class, 'create']);
Route::get('user/create', [UserController::class, 'create'])->name('user.create');

Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');


Route::post('user/create', [UserController::class, 'store']);
Route::delete('user/{id}', [UserController::class, 'destroy']);