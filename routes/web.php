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
Route::get('{slug}', [ProjectController::class, 'projectIndex'])->middleware(['auth', 'role.system'])->name('projectIndex');
Route::get('/{slug}/edit', [ProjectController::class, 'edit'])->middleware(['auth'])->name('editProject');

Route::get('/{slug}/panel/{panel_id}', [PanelController::class, 'panelIndex'])->middleware(['auth', 'verified'])->name('panelIndex');
Route::post('/{slug}/finishPanel/{panel_id}', [PanelController::class, 'finish'])->middleware(['auth', 'verified'])->name('finishPanel');
Route::post('/{slug}/createPanel', [PanelController::class, 'create'])->middleware(['auth', 'verified'])->name('createPanel');
Route::post('/{slug}/editPanel/{panel_id}', [PanelController::class, 'edit'])->middleware(['auth', 'verified'])->name('editPanel');
Route::post('/{slug}/deletePanel/{panel_id}', [PanelController::class, 'delete'])->middleware(['auth', 'verified'])->name('deletePanel');

Route::post('/{slug}/createFeature', [FeatureController::class, 'create'])->middleware(['auth', 'verified'])->name('createFeature');
Route::post('/{slug}/deleteFeature/{feature_id}', [FeatureController::class, 'delete'])->middleware(['auth', 'verified'])->name('deleteFeature');
Route::post('/{slug}/editFeature/{feature_id}', [FeatureController::class, 'edit'])->middleware(['auth', 'verified'])->name('editFeature');

Route::get('/admin/userlist', [DashboardController::class, 'index'])->middleware(['auth'])->name('userlist');
Route::get('/admin/userlist/edit/{user_id}', [DashboardController::class, 'edit'])->middleware(['auth'])->name('editUser');
Route::get('/admin/userlist/delete/{user_id}', [DashboardController::class, 'delete'])->middleware(['auth'])->name('deleteUser');

Route::get('/access_denied', function() {
    die("You shall not pass!!");
})->name('access_denied');

require __DIR__.'/auth.php';
