<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ModelController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/service', [CrudController::class, 'index'])->name('service.all');
Route::post('/service', [CrudController::class, 'store'])->name('service.store');
Route::post('/service/update/{id}', [CrudController::class, 'update'])->name('service.update');
// Route::get('/service/{id}', [CrudController::class, 'show'])->name('service.show');
Route::get('/service/edit/{id}', [CrudController::class, 'edit'])->name('service.edit');
Route::delete('/service/delete/{id}', [CrudController::class, 'destroy'])->name('service.destroy');
//model

Route::get('/model', [ModelController::class, 'index'])->name('model.all');
Route::post('/model', [ModelController::class, 'store'])->name('model.store');
Route::post('/model/update/{id}', [ModelController::class, 'update'])->name('model.update');
Route::get('/model/edit/{id}', [ModelController::class, 'edit'])->name('model.edit');
Route::delete('/model/delete/{id}', [ModelController::class, 'destroy'])->name('model.destroy');
