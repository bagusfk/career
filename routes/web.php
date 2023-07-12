<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InterviewerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {return view('dashboard');})->name('user.index');

Route::middleware(['auth', 'verified', 'myrole:user'])->group(function () {
    Route::get('/lowongan', function () {return view('lowongan');})->name('lowongan');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('admin')->name('admin.')->middleware(['myrole:admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

    Route::prefix('interview')->name('interviewer.')->middleware('myrole:interviewer,admin')->group(function () {
        Route::get('/', [InterviewerController::class, 'index'])->name('index');
    });
});


require __DIR__.'/auth.php';
