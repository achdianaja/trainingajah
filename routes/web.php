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

Route::group([
    'namespace' => 'App',
], function(){
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/{id}/edit',[UserController::class, 'edit']);
        Route::post('/{id}/update',[UserController::class, 'update']);
        Route::get('/{id}/delete',[UserController::class, 'delete']);
        Route::post('/description-delete/{id}',[UserController::class, 'deletedesc']);
    });
});

Route::post('/import', [UserController::class, 'upimport']);
Route::get('/export', [UserController::class, 'upexport']);
Route::get('/pdf', [UserController::class, 'pdfexport']);
// Route::get('/create', function () {
//     return view('create');
// });
Route::get('/import', function () {
    return view('import');
});
// Route::post('/create', [UserController::class, 'create']);