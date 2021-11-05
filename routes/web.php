<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PdfActiController;

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


Route::get('activities', [ActivityController::class, 'index'])->name('activities.index');

Route::get('activities/{activity}',[ActivityController::class, 'show'])->name('activities.show');

Route::get('faculty/{faculty}', [ActivityController::class, 'faculty'])->name('activities.faculty');

Route::get('course/{course}', [ActivityController::class, 'course'])->name('activities.course');

Route::get('activities/pdf/down/{activity}',[PdfActiController::class, 'downPdf'])->name('activities.pdf.down');

Route::get('activities/pdf/show/{activity}',[PdfActiController::class, 'showPdf'])->name('activities.pdf.show');
