<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FeatureController;


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

Route::get('/dashboard', [ProjectController::class, 'index'])->middleware(['auth'])->name('dashboard');

//New route
Route::get('/overview/{project_id}', [ProjectController::class, 'projectOverview'])->middleware(['auth'])->name('projectOverview');
//Old route
// Route::get('/overview', [PanelController::class, 'index'])->middleware(['auth'])->name('projects');

Route::post('/overview/deletePanel/{panel_id}', [PanelController::class, 'delete'])->name('deletePanel');

Route::post('/overview/delete/{feature_id}', [FeatureController::class, 'deleteFeature'])->name('deleteFeature');
Route::get('/overview/edit/{feature_id}', [FeatureController::class, 'editFeature'])->middleware(['auth'])->name('editFeature');
Route::post('/overview/push', [PanelController::class, 'push'])->middleware(['auth'])->name('addPanel');
Route::post('/overview/push-feature', [FeatureController::class, 'push'])->middleware(['auth'])->name('addFeature');
Route::get('/overview/finish', [PanelController::class, 'finish'])->middleware(['auth'])->name('finishPanel');

require __DIR__.'/auth.php';
