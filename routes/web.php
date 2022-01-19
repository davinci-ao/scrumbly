<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\DashboardController;


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

Route::get('/homepage', [ProjectController::class, 'index'])->middleware(['auth'])->name('homepage');

Route::post('/homepage/createProject', [ProjectController::class, 'create'])->middleware(['auth', 'verified'])->name('createProject');
Route::get('/projects', [ProjectController::class, 'index'])->middleware(['auth', 'verified'])->name('projects');
Route::get('/project/{slug}', [ProjectController::class, 'projectIndex'])->middleware(['auth'])->name('projectIndex');
Route::get('/project/{slug}/edit', [ProjectController::class, 'edit'])->middleware(['auth'])->name('editProject');

Route::post('/project/finishPanel/{panel_id}', [PanelController::class, 'finish'])->middleware(['auth', 'verified'])->name('finishPanel');
Route::post('/project/createPanel', [PanelController::class, 'create'])->middleware(['auth', 'verified'])->name('createPanel');
Route::post('/project/editPanel/{panel_id}', [PanelController::class, 'edit'])->middleware(['auth', 'verified'])->name('editPanel');
Route::post('/project/deletePanel/{panel_id}', [PanelController::class, 'delete'])->middleware(['auth', 'verified'])->name('deletePanel');

Route::post('/project/createFeature', [FeatureController::class, 'create'])->middleware(['auth', 'verified'])->name('createFeature');
Route::post('/project/deleteFeature/{feature_id}', [FeatureController::class, 'delete'])->middleware(['auth', 'verified'])->name('deleteFeature');
Route::post('/project/editFeature/{feature_id}', [FeatureController::class, 'edit'])->middleware(['auth', 'verified'])->name('editFeature');

Route::get('/userlist', [DashboardController::class, 'index'])->middleware(['auth'])->name('userlist');
Route::get('/userlist/edit/{user_id}', [DashboardController::class, 'edit'])->middleware(['auth'])->name('editUser');
Route::get('/userlist/delete/{user_id}', [DashboardController::class, 'delete'])->middleware(['auth'])->name('deleteUser');

require __DIR__.'/auth.php';
