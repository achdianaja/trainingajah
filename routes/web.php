<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/route-import', [UserController::class, 'import']);
Route::post('/import', [UserController::class, 'upimport']);
Route::get('/export', [UserController::class, 'upexport']);
Route::get('/pdf', [UserController::class, 'pdfexport']);
Route::get('/create', function () {
    return view('create');
});
Route::get('/import', function () {
    return view('import');
});
Route::post('/create', [UserController::class, 'create']);
Route::get('/hapus/{id}',[UserController::class, 'delete']);