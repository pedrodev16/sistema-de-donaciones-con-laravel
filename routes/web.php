<?php

use App\Http\Controllers\admin\main;
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
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');


//middleware para proteger la ruta
Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('admin.Welcome');
    })->name('home');

    Route::get('/beneficiarios', function () {
        return view('admin.beneficiarios');
    })->name('beneficiarios');

    Route::get('/donaciones', function () {
        return view('admin.donaciones');
    })->name('donaciones');

    Route::get('/historiadonaciones', [main::class, 'donaciones'])->name('historiadonaciones');;

    Route::get('/usuarios', function () {
        return view('admin.usuarios');
    })->name('usuarios');


    Route::get('/medicinas', function () {
        return view('admin.medicinas');
    })->name('medicinas');

    Route::get('/stock', function () {
        return view('admin.stock');
    })->name('stock');

    Route::get('/reportes', function () {
        return view('admin.reportes');
    })->name('reportes');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
