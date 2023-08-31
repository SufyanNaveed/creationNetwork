<?php

use App\Http\Controllers\Admin\V1\ChatGPTController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\V1\Auth\LoginController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', function () {
    return view('Admin.Auth.login');
});
Route::get('/index', function () {
    return view('Admin.Index');
});

// Route::prefix('admin')->controller(LoginController::class)->group(function () { 
//     Route::post('/login', 'login')->name('admin.login');
// });

Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/chat', [ChatGPTController::class, 'index']);
Route::post('/chat', [ChatGPTController::class, 'genearteTextResponse'])->name('chat.post');
Route::get('/image-converter', [ChatGPTController::class, 'showImageToText'])->name('image.index');
Route::post('/image', [ChatGPTController::class, 'imageToText'])->name('image.post');