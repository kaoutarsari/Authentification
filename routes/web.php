<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get("/", [todoController::class, "index"]);

Route::post('/',[todoController::class,"store"])->name('store');

Route::delete('/{todo}',[todoController::class,"delete"])->name('deleted');

Route::put('/{todo}',[todoController::class,"update"])->name('updated');



//authentification

//register
Route::post('/registerr', [RegisterController::class, 'store'])->name("auth");
//errur
//The GET method is not supported for this route. Supported methods: POST, PUT, DELETE.
Route::get('/registerr', [RegisterController::class, 'index']);

//login

Route::post('/logine', [LoginController::class, 'login'])->name("logine");
Route::get('/logine', [loginController::class, 'index']);