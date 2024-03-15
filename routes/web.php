<?php

use App\Models\User;
use App\Livewire\Link;
use App\Livewire\UpdateData;
use App\Livewire\RegistrationWR;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Livewire\Test;

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
                                        Route::get('/test', Test::class);
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


Route::get('/rubah', function () {
    for ($i = 1; $i < 15; $i++) {

        User::where('id', $i)
            ->update([
                'office' => 'FP One',
                'address_1' => 'Thamrin Nine Complex',
                'address_2' => 'Autograph Tower 28th Floor',
                'address_3' => 'Jl. M.H Thamrin No. 10',
                'address_4' => 'Jakarta Pusat - 10230',
            ]);
    }
});


// Route::view('/', 'welcome');
Route::redirect('/', 'login');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/Card/{code}', [UserController::class, 'user']);




require __DIR__ . '/auth.php';
