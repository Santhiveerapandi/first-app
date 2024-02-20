<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\VendorPanel\VendorController;
use App\Http\Controllers\CustomerPanel\CustomerController;
use App\Http\Controllers\ExcelUploadController;
use App\Http\Controllers\RedisController;

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

Route::get('/', function () {
    // \Mail::to('sharmila@cloudrevelinnovation.com')->send(new \App\Mail\SendTestMail());
    dispatch(new \App\Jobs\SendEmailJob());
    return view('welcome');
});
Route::get('/test', function () {
    return config('app.env');
});
Route::get('/redis', [RedisController::class, 'index']);

Route::get('/upload', [ExcelUploadController::class, 'Upload'])->name('upload');
Route::post('/uploadexcel', [ExcelUploadController::class, 'BigExcelUpload'])->name('uploadexcel');
//->middleware(['auth', 'verified'])->name('dashboard');


/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/dashboard', [CustomerController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth','role:vendor'])->group(function () {
    Route::get('vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
});