<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;

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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('edit-user/{id}', [UserController::class, 'edit']);
    Route::put('update-user/{id}', [UserController::class, 'update']);
    Route::get('add-notifications', [NotificationController::class, 'insertForm'])->name('addNotifications');
    Route::post('add-notifications', [NotificationController::class, 'add'])->name('saveNotifications');
    Route::get('list-notifications', [NotificationController::class, 'list'])->name('listNotifications');
    Route::get('view-notification/{id}', [NotificationController::class, 'view'])->name('viewNotifications');
    Route::post('change-status', [NotificationController::class, 'changeStatus'])->name('changeStatus');

});


require __DIR__.'/auth.php';
