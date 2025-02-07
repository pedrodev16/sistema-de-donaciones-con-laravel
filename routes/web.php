<?php

use App\Http\Controllers\Login\LoginController as LoginController;
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
    return view('login');
});

//HOME
Route::get('/home', function () {
    return view('admin.Welcome');
})->name('home');

Route::post('/login', [LoginController::class, 'login'])->name('login');
