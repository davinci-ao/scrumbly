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
Route::get('/projects', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects');
Route::get('/project/{project_id}', [ProjectController::class, 'projectIndex'])->middleware(['auth'])->name('projectIndex');
Route::post('/project/finishPanel/{panel_id}', [PanelController::class, 'finishPanel'])->middleware(['auth'])->name('finishPanel');
Route::post('/project/createPanel', [PanelController::class, 'createPanel'])->middleware(['auth'])->name('createPanel');
Route::post('/project/editPanel/{panel_id}', [PanelController::class, 'editPanel'])->middleware(['auth'])->name('editPanel');
Route::post('/project/deletePanel/{panel_id}', [PanelController::class, 'deletePanel'])->middleware(['auth'])->name('deletePanel');

Route::post('/project/createFeature', [FeatureController::class, 'createFeature'])->middleware(['auth'])->name('createFeature');
Route::post('/project/deleteFeature/{feature_id}', [FeatureController::class, 'deleteFeature'])->middleware(['auth'])->name('deleteFeature');
Route::post('/project/editFeature/{feature_id}', [FeatureController::class, 'editFeature'])->middleware(['auth'])->name('editFeature');

Route::get('/userlist', [DashboardController::class, 'index'])->middleware(['auth'])->name('userlist');
Route::get('/userlist/edit/{user_id}', [DashboardController::class, 'edit'])->middleware(['auth'])->name('editUser');
Route::get('/userlist/delete/{user_id}', [DashboardController::class, 'delete'])->middleware(['auth'])->name('deleteUser');

require __DIR__.'/auth.php';
