<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TVController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("/", [MovieController::class,'index'])->name("movies.index");

Route::get("/movies/{id}/show", [MovieController::class,'show'])->name("movies.show");

Route::get("/tv", [TVController::class,'index'])->name("tv.index");

Route::get("/tv/{id}/show", [TVController::class,'show'])->name("tv.show");

Route::get("/actors", [ActorsController::class,'index'])->name("actors.index");

Route::get("/actors/page/{page?}", [ActorsController::class,'index']);

Route::get("/actors/{id}/show", [ActorsController::class,'show'])->name("actors.show");


