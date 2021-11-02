<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PdfController;

use App\Http\Controllers\Activities\ActivityController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('posts/pdf/down/{post}',[PdfController::class, 'downPdf'])->name('posts.pdf.down');

Route::get('posts/pdf/show/{post}',[PdfController::class, 'showPdf'])->name('posts.pdf.show');


/* actividades */


Route::get('activities', [ActivityController::class, 'index'])->name('admin.activities.index');

Route::get('activities/{activity}',[ActivityController::class, 'show'])->name('admin.activities.show');

Route::get('faculty/{faculty}', [ActivityController::class, 'faculty'])->name('admin.activities.faculty');

Route::get('course/{course}', [ActivityController::class, 'course'])->name('admin.activities.course');

Route::get('activities/pdf/down/{activity}',[PdfController::class, 'downPdf'])->name('admin.activities.pdf.down');

Route::get('activities/pdf/show/{activity}',[PdfController::class, 'showPdf'])->name('admin.activities.pdf.show');
