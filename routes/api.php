<?php

use App\Http\Controllers\consultationsController;
use App\Http\Controllers\societyController;
use App\Http\Controllers\spotsController;
use App\Models\regionals;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::post('/login', [userController::class, 'doLogin']);
// Route::post('/register', [userController::class, 'doRegister'])->name('register');

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::get('make-admin', function () {
//     User::create([
//         'name' => 'admin',
//         'email' => 'admin@admin.com',
//         'regional_id' => '1',
//         'password' => Hash::make('adminadmin'),
//     ]);
//     return print_r('berhasil Membuat Admin');
// });
// Route::get('make-regional', function () {
//     regionals::create([
//         'province' => 'JAWA TIMUR',
//         'district' => 'KABUPATEN PASURUAN'
//     ]);
//     return print_r('berhasil Membuat district');
// });


// Route::apiResource('/regionals', regionalsController::class);
Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/login', [societyController::class, 'login']);
        Route::post('/logout', [societyController::class, 'logout']);
    });
    Route::middleware('checkToken')->group(function () {
        Route::post('/consultations', [consultationsController::class, 'requestConsultation']);
        Route::get('/consultations', [consultationsController::class, 'getConsultation']);
        Route::get('/spots', [spotsController::class, 'getAllSpots']);
        Route::get('/spots/{id}', [spotsController::class, 'getDetailSpots']);
    });
});
