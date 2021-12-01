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

Route::get('/dashboard', [ProjectController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//New route
Route::get('/overview/{project_id}', [ProjectController::class, 'projectOverview'])->middleware(['auth', 'verified'])->name('projectOverview');

Route::post('/overview/deletePanel/{panel_id}', [PanelController::class, 'delete'])->name('deletePanel');

Route::post('/overview/delete/{feature_id}', [FeatureController::class, 'deleteFeature'])->name('deleteFeature');
Route::post('/overview/edit/{feature_id}', [FeatureController::class, 'editFeature'])->middleware(['auth', 'verified'])->name('editFeature');
Route::post('/overview/editPanel/{panel_id}', [PanelController::class, 'edit'])->middleware(['auth', 'verified'])->name('editPanel');
Route::post('/overview/push', [PanelController::class, 'push'])->middleware(['auth', 'verified'])->name('addPanel');
Route::post('/overview/push-feature', [FeatureController::class, 'push'])->middleware(['auth', 'verified'])->name('addFeature');
Route::get('/overview/finish', [PanelController::class, 'finish'])->middleware(['auth', 'verified'])->name('finishPanel');


require __DIR__.'/auth.php';
