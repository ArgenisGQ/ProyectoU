<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\Activities\PeriodController;

use App\Http\Controllers\Activities\IndexController;
use App\Http\Controllers\Activities\ActivityAdminController;
use App\Http\Controllers\Activities\CourseAdminController;
use App\Http\Controllers\Activities\FacultyAdminController;


Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'create', 'edit', 'store', 'update', 'destroy'])->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->names('admin.posts');

Route::get('users/import', [ExcelController::class, 'importForm'])->name('admin.users.importForm');

Route::post('users/import', [ExcelController::class, 'import'])->name('admin.users.import');

/* actividades */

/* <<<<<<< HEAD */
/* Route::get('test/activities', [IndexController::class, 'index'])->middleware('can:admin.index')->name('admin.activities.index'); */

Route::get('test/activities', [IndexController::class, 'index'])->name('admin.activities.index');

Route::resource('faculties', FacultyAdminController::class)->except('show')->names('admin.faculties');

Route::resource('courses', CourseAdminController::class)->except('show')->names('admin.courses');

Route::resource('activities', ActivityAdminController::class)->names('admin.activities');

Route::resource('periods', PeriodController::class)->names('admin.periods');
/* ======= */
/* Route::get('activities', [IndexController::class, 'index'])->middleware('can:admin.home')->name('admin.activities'); */

/* Route::resource('faculties', FacultyAdminController::class)->except('show')->names('admin.faculties'); */

/* Route::resource('courses', CourseAdminController::class)->except('show')->names('admin.courses'); */

/* Route::resource('activities', ActivityAdminController::class)->names('admin.activitiess'); */
/* >>>>>>> 6e77047057419116d7ff8baf2079b444e83ff351 */
