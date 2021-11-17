<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SprintController;
use App\Http\Controllers\ProjectsController;
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

Route::get('/dashboard', [ProjectsController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/overview', [SprintController::class, 'index'])->middleware(['auth'])->name('projects');

Route::post('/overview/delete/{feature_id}', [FeatureController::class, 'deleteFeature'])->name('deleteFeature');
Route::get('/overview/edit/{feature_id}', [FeatureController::class, 'editFeature'])->middleware(['auth'])->name('editFeature');
Route::get('/overview/push', [SprintController::class, 'push'])->middleware(['auth'])->name('addSprint');
Route::get('/overview/push-feature', [FeatureController::class, 'push'])->middleware(['auth'])->name('addFeature');
Route::get('/overview/finish', [SprintController::class, 'finish'])->middleware(['auth'])->name('finishSprint');

require __DIR__.'/auth.php';
