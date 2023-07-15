<?php

use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use function PHPUnit\Framework\callback;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\halamanController;

use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::redirect('home', 'dashboard');

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest'); // untuk melempar ke halaman login

//mengambil fungsi dari auth coontroller
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');

Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
//  
Route::get('/auth/logout', [authController::class, "logout"]);

//fungsi middleware untuk melempar yang tidak punya akses
Route::prefix('dashboard')->middleware('auth')->group(
    function () {
        // Route::get('/', function () {
        //     return view('dashboard.index');
        // });
        Route::get('/', [halamanController::class, 'index']);
        // Route::get('halaman', [halamanController::class, 'index']); 
        Route::resource('halaman', halamanController::class); // resource bbertujuan untuk mengakses semua fungsi
        Route::resource('experience', experienceController::class);
        Route::resource('education', educationController::class);
    }
);
