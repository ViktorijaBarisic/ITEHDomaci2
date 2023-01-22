<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\API\AuthController;



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




Route::resource('books', BookController::class);

Route::get('/users', [UserController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/books/categories/{category_id}', [BookController::class, 'getByCategory']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class,'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('books', BookController::class)->only(['store', 'update', 'destroy']);

    Route::post('books',[BookController::class,'store']);
    Route::put('books/{id}',[BookController::class,'update']);
    Route::delete('books/{id}',[BookController::class,'destroy']);

    Route::get('myBooks',[BookController::class,'my_books']);

    Route::post('/logout',[AuthController::class,'logout']);

    
});



