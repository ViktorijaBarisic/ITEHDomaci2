<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);



// Route::resource('books', BookController::class);


// Route::resource('types', TypeController::class);
// Route::resource('brands', BrandController::class);
// Route::resource('users', UserController::class);

// Route::post('/register',[AuthController::class,'register']);
// Route::post('/login',[AuthController::class,'login']);


//  Route::get('sneakers/brand/{id}',[SneakersController::class,'getByBrand']);

//  Route::get('sneakers/type/{id}',[SneakersController::class,'getByType']);


//  Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('/profile', function(Request $request) {
//         return auth()->user();
//     });

//     Route::get('my-sneakers',[SneakersController::class,'mySneakers']);

//     Route::get('/logout',[AuthController::class,'logout']);

//     Route::resource('sneakers',SneakersController::class)->only('store','update','destroy');

// });
