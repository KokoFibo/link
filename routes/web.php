<?php

use App\Http\Controllers\UserController;
use App\Livewire\Link;
use App\Livewire\RegistrationWR;
use App\Livewire\UpdateData;
use Illuminate\Support\Facades\File;
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

Route::middleware(['auth'])->group(
    function () {

        Route::middleware(['User'])->group(
            function () {
                Route::get('/link', Link::class)->name('link');
                Route::get('/vcf/{code}', [UserController::class, 'vcf']);
                Route::get('/update', UpdateData::class)->name('update');

                Route::middleware(['Admin'])->group(
                    function () {

                        Route::get('/registration', RegistrationWR::class)->name('registration');


                        Route::middleware(['SuperAdmin'])->group(
                            function () {

                                Route::middleware(['SuperAdmin'])->group(
                                    function () {
                                    }
                                );
                            }
                        );
                    }
                );
            }
        );
    }
);


// Route::get('/registration', RegistrationWR::class)->name('registration');
Route::get('/link', Link::class)->name('link');
Route::get('/vcf/{code}', [UserController::class, 'vcf']);
Route::get('/Card/{code}', [UserController::class, 'user']);


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');







require __DIR__ . '/auth.php';
