<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Word\WordController;
use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

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

// Route::get('translate', function(){
    
// });

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::get('/', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/home', 'dashboard')->name('data','data_word');
    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(UserController::class)->group(function() {
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/edit.profile', 'edit_profile')->name('edit.profile');
    Route::put('/uploads/{id}', 'uploads')->name('uploads');
    Route::get('/contact', 'contact')->name('contact');
});
Route::controller(WordController::class)->group(function() {
    Route::get('/word', 'word')->name('word');
    Route::get('/word.search', 'search')->name('word.search');
});

