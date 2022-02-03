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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/homepage', [ProjectController::class, 'index'])->name('homepage');

    Route::post('/homepage/createProject', [ProjectController::class, 'create'])->name('createProject');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

    Route::get('/admin/userlist', [DashboardController::class, 'index'])->name('userlist');
    Route::get('/admin/userlist/edit/{user_id}', [DashboardController::class, 'edit'])->name('editUser');
    Route::get('/admin/userlist/delete/{user_id}', [DashboardController::class, 'delete'])->name('deleteUser');
    
    Route::middleware(['role.system'])->group(function () {
        Route::get('{slug}', [ProjectController::class, 'projectIndex'])->name('projectIndex');
        Route::get('/{slug}/edit', [ProjectController::class, 'edit'])->name('editProject');
        
        Route::get('/{slug}/panel/{panel_id}', [PanelController::class, 'panelIndex'])->name('panelIndex');
        Route::post('/{slug}/finishPanel/{panel_id}', [PanelController::class, 'finish'])->name('finishPanel');
        Route::post('/{slug}/createPanel', [PanelController::class, 'create'])->name('createPanel');
        Route::post('/{slug}/editPanel/{panel_id}', [PanelController::class, 'edit'])->name('editPanel');
        Route::post('/{slug}/deletePanel/{panel_id}', [PanelController::class, 'delete'])->name('deletePanel');
        
        Route::get('/{slug}/editMember/{member_id}', [ProjectController::class, 'editMember'])->name('editMember');
        Route::get('/{slug}/deleteMember/{member_id}', [ProjectController::class, 'deleteMember'])->name('deleteMember');
        
        Route::post('/{slug}/createFeature', [FeatureController::class, 'create'])->name('createFeature');
        Route::post('/{slug}/deleteFeature/{feature_id}', [FeatureController::class, 'delete'])->name('deleteFeature');
        Route::post('/{slug}/editFeature/{feature_id}', [FeatureController::class, 'edit'])->name('editFeature');
    });
});

Route::get('/access_denied', function() {
    die("You shall not pass!!");
})->name('access_denied');

require __DIR__.'/auth.php';
