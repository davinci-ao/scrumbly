<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SprintController;
use App\Http\Controllers\ProjectsController;

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

Route::get('/project/delete/{feature_id}', [App\Http\Controllers\projectsController::class, 'deleteFeature'])->name('feature.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/overview', [SprintController::class, 'index'])->middleware(['auth'])->name('projects');

Route::get('/overview/push', [SprintController::class, 'push'])->middleware(['auth'])->name('addSprint');
Route::get('/overview/finish', [SprintController::class, 'finish'])->middleware(['auth'])->name('finishSprint');

require __DIR__.'/auth.php';
