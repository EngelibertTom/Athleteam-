<?php

use App\Http\Controllers\MyController;
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

Route::get('/', [MyController::class ,'home']);





Route::get('/coach', [MyController::class ,'coach']);

Route::get('/profil', [MyController::class ,'profile']);

Route::get('/profil/{id}', [MyController::class , 'otherprofil'])->where('id', '[0-9]+');

Route::get('/post/{id}', [MyController::class , 'post'])->where('id', '[0-9]+');

Route::post('/profil/update', [MyController::class, 'update'])->middleware("auth");

Route::get('/createpost', function () {
    return view('createpost');
});

Route::delete('/post/delete/{id}', [MyController::class, 'delete'])->middleware("auth");;


Route::post('/create/post', [MyController::class, 'createpost'])->middleware("auth");

Route::get("/follow/{id}", [MyController::class, 'follow'])->where('id', '[0-9]+')->middleware("auth");

Route::post('/comments', [MyController::class, 'store'])->middleware("auth");

Route::post('/setcoach/{id}', [MyController::class, 'becoach'])->where('id', '[0-9]+')->middleware("auth");

Route::post('/unsetcoach/{id}', [MyController::class, 'notbecoach'])->where('id', '[0-9]+')->middleware("auth");

Route::post('/profil/updateButton', [MyController::class, 'updateForm']);

Route::get('/matches/upcoming', [MyController::class, 'upcomingMatches']);
Route::get('/matches/past', [MyController::class, 'pastMatches']);
Route::middleware('admin')->post('/matches/score', [MyController::class, 'addScore'])->name('matches.score');





Route::get('/admin/create', [MyController::class, 'creatematch']);
Route::post('/admin/clubs', [MyController::class, 'storeclub']);
Route::post('/admin/match', [MyController::class, 'storematch']);
Route::post('/admin/sports', [MyController::class, 'storeSport']);








