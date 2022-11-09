<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, UserController, RoleController,
AcceptedController, MahasiswaController, QueueController};
use App\Models\queue;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
	'middleware' => 'auth',
	'prefix' => 'admin',
	'as' => 'admin.'
], function(){
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::get('/logs', [DashboardController::class, 'activity_logs'])->name('logs');
	Route::post('/logs/delete', [DashboardController::class, 'delete_logs'])->name('logs.delete');

	// Settings menu
	Route::view('/settings', 'admin.settings')->name('settings');
	Route::post('/settings', [DashboardController::class, 'settings_store'])->name('settings');

	// Profile menu
	Route::view('/profile', 'admin.profile')->name('profile');
	Route::post('/profile', [DashboardController::class, 'profile_update'])->name('profile');
	Route::post('/profile/upload', [DashboardController::class, 'upload_avatar'])
		->name('profile.upload');

    //pendaftaran jalur lomba
    Route::get('/pendaftaranjalurlomba', [QueueController::class, 'index'])->name('pendaftaranjalurlomba');
	Route::get('/pendaftaranjalurlomba/create', [QueueController::class, 'create'])->name('pendaftaranjalurlomba.create');
	Route::post('/pendaftaranjalurlomba/create', [QueueController::class, 'store'])->name('pendaftaranjalurlomba.create');
	Route::get('/pendaftaranjalurlomba/{id}/edit', [QueueController::class, 'edit'])->name('pendaftaranjalurlomba.edit');
	Route::post('/pendaftaranjalurlomba/{id}/update', [QueueController::class, 'update'])->name('pendaftaranjalurlomba.update');
	Route::post('/pendaftaranjalurlomba/{id}/delete', [QueueController::class, 'destroy'])->name('pendaftaranjalurlomba.delete');

	// Member menu
	Route::get('/member', [UserController::class, 'index'])->name('member');
	Route::get('/member/create', [UserController::class, 'create'])->name('member.create');
	Route::post('/member/create', [UserController::class, 'store'])->name('member.create');
	Route::get('/member/{id}/edit', [UserController::class, 'edit'])->name('member.edit');
	Route::post('/member/{id}/update', [UserController::class, 'update'])->name('member.update');
	Route::post('/member/{id}/delete', [UserController::class, 'destroy'])->name('member.delete');

	// Roles menu
	Route::get('/roles', [RoleController::class, 'index'])->name('roles');
	Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
	Route::post('/roles/create', [RoleController::class, 'store'])->name('roles.create');
	Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
	Route::post('/roles/{id}/update', [RoleController::class, 'update'])->name('roles.update');
	Route::post('/roles/{id}/delete', [RoleController::class, 'destroy'])->name('roles.delete');

});


require __DIR__.'/auth.php';
