<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SprintController;
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
Route::get('/overview', [SprintController::class, 'index'])->middleware(['auth'])->name('projects');
Route::get('/userlist', [DashboardController::class, 'index'])->middleware(['auth'])->name('userlist');

Route::post('/overview/delete/{feature_id}', [FeatureController::class, 'deleteFeature'])->name('deleteFeature');
Route::get('/overview/edit/{feature_id}', [FeatureController::class, 'editFeature'])->middleware(['auth'])->name('editFeature');
Route::get('/overview/push', [SprintController::class, 'push'])->middleware(['auth'])->name('addSprint');
Route::get('/overview/push-feature', [FeatureController::class, 'push'])->middleware(['auth'])->name('addFeature');
Route::get('/overview/finish', [SprintController::class, 'finish'])->middleware(['auth'])->name('finishSprint');
Route::get('/userlist/edit/{id}', [DashboardController::class, 'edit'])->middleware(['auth'])->name('editUser');
Route::get('/userlist/delete/{id}', [DashboardController::class, 'delete'])->middleware(['auth'])->name('deleteUser');

require __DIR__.'/auth.php';
