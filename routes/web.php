<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WorkController;
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

Route::get('/', WelcomeController::class)->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('menu', MenuController::class)
    ->only('index', 'create', 'store', 'edit', 'update', 'destroy')
    ->middleware(['auth', 'verified']);

Route::resource('header', HeaderController::class)
    ->only('index', 'create', 'store', 'destroy')
    ->middleware(['auth', 'verified']);

Route::resource('about', AboutController::class)
    ->only('index', 'create', 'store', 'destroy')
    ->middleware(['auth', 'verified']);

Route::resource('skill', SkillController::class)
    ->only('index', 'create', 'store', 'edit', 'update', 'destroy')
    ->middleware(['auth', 'verified']);

Route::resource('work', WorkController::class)
    ->only('index', 'create', 'store', 'edit', 'update', 'destroy')
    ->middleware(['auth', 'verified']);

Route::resource('contact', ContactController::class)
    ->only('index', 'create', 'store', 'destroy')
    ->middleware(['auth', 'verified']);

Route::resource('social', SocialController::class)
    ->only('index', 'create', 'store', 'edit', 'update', 'destroy')
    ->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
