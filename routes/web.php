<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PdfActiController;

use App\Http\Controllers\Activities\ActivityController;
use CKSource\CKFinder\CKFinder;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Auth::routes(["register" => false]); */

Route::any('/register', function() {
    return  view('auth.login');
});

Route::any('/', function() {
    return  view('home.version01.index');
});

/* Route::any('/login', function() {
    return  view('auth.login');
}); */

/* Route::get('/', [PostController::class, 'index'])->name('posts.index'); */

/* Route::get('/', [ActivityController::class, 'index'])->name('activities.index'); */

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tags/{tag}', [PostController::class, 'tag'])->name('posts.tag');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('posts/pdf/down/{post}',[PdfController::class, 'downPdf'])->name('posts.pdf.down');

Route::get('posts/pdf/show/{post}',[PdfController::class, 'showPdf'])->name('posts.pdf.show');


/* actividades */


Route::get('activities', [ActivityController::class, 'index'])->name('activities.index');

Route::get('activities/{activity}',[ActivityController::class, 'show'])->name('activities.show');

Route::get('faculty/{faculty}', [ActivityController::class, 'faculty'])->name('activities.faculty');

Route::get('course/{course}', [ActivityController::class, 'course'])->name('activities.course');

Route::get('activities/pdf/down/{activity}',[PdfActiController::class, 'downPdf'])->name('activities.pdf.down');

Route::get('activities/pdf/show/{activity}',[PdfActiController::class, 'showPdf'])->name('activities.pdf.show');


/* CKFinder */

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

/* LOG OUT DE SISTEMA */

/* Route::get('/logout', 'LogoutController@perform')->name('logout.perform'); */
Route::get('logout', [LogoutController::class, 'perform'])->name('logout.perform');
