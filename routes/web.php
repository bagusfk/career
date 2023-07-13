<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InterviewerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\PenerimaanController;
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/lamaran', [LamaranController::class,'index'])->name('lamaran.index');
    Route::get('/lamaran/{lowongan}', [LamaranController::class,'create'])->name('lamaran.create');
    Route::Post('/lamaran/create', [LamaranController::class,'store'])->name('lamaran.store');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::middleware(['myrole:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('/admin/lowongan', LowonganController::class);
        Route::resource('/admin/penerimaan', PenerimaanController::class);
    });

    Route::prefix('interview')->name('interviewer.')->middleware('myrole:interviewer,admin')->group(function () {
        Route::get('/', [InterviewerController::class, 'index'])->name('index');
    });
});


require __DIR__.'/auth.php';
