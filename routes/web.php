<?php

use App\Http\Controllers\ExpoController;
use App\Http\Controllers\ProjectCategoriesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotesController;
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
Route::get('/', [ExpoController::class, 'index']);
Route::post('voting', [VotesController::class, 'store']);
Route::get('administrator', function () {
    return redirect(url('administrator/dashboard')); 
});

Route::middleware(['LoginMiddleware'])->group(function () {
    Route::get('administrator/login', function () {
        return view('administrator/login');
    });
    Route::post('administrator/auth/login', [UserController::class, 'authLogin']);
});
Route::middleware(['AuthMiddleware'])->group(function () {
    Route::get('administrator/edit', [ExpoController::class, 'expoAdminEdit']);
    Route::post('administrator/config/updating', [ExpoController::class, 'expoConfUpdate']);
    Route::post('administrator/u/updating', [ExpoController::class, 'expoAdminUpdate']);
    Route::get('administrator/dashboard', [ExpoController::class, 'dashboard']);
    Route::get('administrator/auth/logout', [UserController::class, 'authLogout']);
    Route::get('administrator/votes', [VotesController::class, 'index']);
    Route::get('administrator/vote/delete', [VotesController::class, 'destroy']);
    Route::get('administrator/projects', [ProjectController::class, 'index']);
    Route::get('administrator/project/edit', [ProjectController::class, 'edit']);
    Route::get('administrator/project/delete', [ProjectController::class, 'destroy']);
    Route::post('administrator/project/updating', [ProjectController::class, 'update']);
    Route::post('administrator/project/inserting', [ProjectController::class, 'store']);
    Route::get('administrator/project-categories', [ProjectCategoriesController::class, 'index']);
    Route::get('administrator/project-category/edit', [ProjectCategoriesController::class, 'edit']);
    Route::get('administrator/project-category/deleting', [ProjectCategoriesController::class, 'destroy']);
    Route::post('administrator/project-category/updating', [ProjectCategoriesController::class, 'update']);
    Route::post('administrator/project-category/inserting', [ProjectCategoriesController::class, 'store']);
});