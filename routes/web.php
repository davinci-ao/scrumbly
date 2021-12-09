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
Route::get('/projects', [ProjectController::class, 'index'])->middleware(['auth', 'verified'])->name('projects');
Route::get('/project/{project_id}', [ProjectController::class, 'projectIndex'])->middleware(['auth', 'verified'])->name('projectIndex');
Route::post('/project/finishPanel/{panel_id}', [PanelController::class, 'finishPanel'])->middleware(['auth', 'verified'])->name('finishPanel');
Route::post('/project/createPanel', [PanelController::class, 'createPanel'])->middleware(['auth', 'verified'])->name('createPanel');
Route::post('/project/editPanel/{panel_id}', [PanelController::class, 'editPanel'])->middleware(['auth', 'verified'])->name('editPanel');
Route::post('/project/deletePanel/{panel_id}', [PanelController::class, 'deletePanel'])->middleware(['auth', 'verified'])->name('deletePanel');

Route::post('/project/createFeature', [FeatureController::class, 'createFeature'])->middleware(['auth', 'verified'])->name('createFeature');
Route::post('/project/deleteFeature/{feature_id}', [FeatureController::class, 'deleteFeature'])->middleware(['auth', 'verified'])->name('deleteFeature');
Route::post('/project/editFeature/{feature_id}', [FeatureController::class, 'editFeature'])->middleware(['auth', 'verified'])->name('editFeature');

Route::get('/userlist', [DashboardController::class, 'index'])->middleware(['auth'])->name('userlist');


require __DIR__.'/auth.php';
