<?php

use App\Http\Controllers\GeneralProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InterviewerController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\Auth\RegisteredUserController;
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
    Route::get('/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/lamaran', [LamaranController::class,'index'])->name('lamaran.index');
    Route::get('/lamaran/{lowongan}', [LamaranController::class,'create'])->name('lamaran.create');
    Route::Post('/lamaran/create', [LamaranController::class,'store'])->name('lamaran.store');

    Route::resource('/timeline', TimelineController::class);
    Route::resource('/answer', AnswerController::class);

    Route::resource('/profiles', GeneralProfileController::class);
    Route::resource('/berkas', BerkasController::class)
        ->only(['edit','update']);
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::middleware(['myrole:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('/admin/lowongan', LowonganController::class);
        Route::resource('/admin/penerimaan', PenerimaanController::class);
        Route::resource('/admin/interviewers', InterviewerController::class);
        Route::get('/admin/interview/{interview}', [InterviewController::class,'create'])->name('interview.create');
        Route::Post('/admin/interview/create', [InterviewController::class,'store'])->name('interview.store');
        Route::get('/admin/berkas-pelamar/{berkas}',[BerkasController::class,'show'])->name('berkas.show');
    });

    Route::middleware('myrole:interviewer,admin')->group(function () {
        // Route::resource('/admin/penerimaan', PenerimaanController::class);
        Route::get('/interviewer', [InterviewController::class,'index'])->name('interviewer.index');
        Route::get('/interviewer/interview/{interviewer}/edit', [InterviewController::class,'edit'])->name('interviewer.edit');
        Route::Put('/interviewer/interview/{interviewer}', [InterviewController::class,'update'])->name('interviewer.update');
    });
});


require __DIR__.'/auth.php';
