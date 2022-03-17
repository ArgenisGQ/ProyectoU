<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ExcelCourseController;
use App\Http\Controllers\ExcelUserCourseController;
use App\Http\Controllers\Activities\PeriodController;

use App\Http\Controllers\Activities\IndexController;
use App\Http\Controllers\Activities\ActivityAdminController;
use App\Http\Controllers\Activities\CourseAdminController;
use App\Http\Controllers\Activities\FacultyAdminController;



Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'create', 'edit', 'store', 'show', 'update', 'destroy'])->names('admin.users');

Route::resource('roles', RoleController::class)->only(['index', 'create', 'edit', 'store', 'show', 'update', 'destroy'])->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->names('admin.posts');

Route::get('import', [ExcelController::class, 'importForm'])->name('admin.users.importform');

Route::post('import', [ExcelController::class, 'import'])->name('admin.users.import');

Route::get('importcourse', [ExcelCourseController::class, 'importForm'])->name('admin.courses.importform');

Route::post('importcourse', [ExcelCourseController::class, 'import'])->name('admin.courses.import');

Route::get('importusercourse', [ExcelUserCourseController::class, 'importForm'])->name('admin.usercourses.importform');

Route::post('importusercourse', [ExcelUserCourseController::class, 'import'])->name('admin.usercourses.import');

Route::get('analisys', [ExcelUserCourseController::class, 'alls'])->name('admin.usercourses.analisys' );

Route::get('analisyscourses', [ExcelUserCourseController::class, 'courses'])->name('admin.usercourses.analisyscourses' );

Route::get('analisysusers', [ExcelUserCourseController::class, 'users'])->name('admin.usercourses.analisysusers' );

Route::get('users/import', function () {
    return 'Hello World';
});

/* Route::post('users/import', [ExcelController::class, 'importForm'])->name('admin.users.import'); */ //test

/* actividades */

/* <<<<<<< HEAD */
/* Route::get('test/activities', [IndexController::class, 'index'])->middleware('can:admin.index')->name('admin.activities.index'); */

Route::get('test/activities', [IndexController::class, 'index'])->name('admin.activities.index');

Route::resource('faculties', FacultyAdminController::class)->except('show')->names('admin.faculties');

Route::resource('courses', CourseAdminController::class)->except('show')->names('admin.courses');

Route::resource('activities', ActivityAdminController::class)->only(['index', 'create', 'edit', 'store', 'show', 'update', 'destroy'])->names('admin.activities');

Route::resource('periods', PeriodController::class)->only(['index', 'create', 'edit', 'store', 'show', 'update', 'destroy'])->names('admin.periods');
/* ======= */
/* Route::get('activities', [IndexController::class, 'index'])->middleware('can:admin.home')->name('admin.activities'); */

/* Route::resource('faculties', FacultyAdminController::class)->except('show')->names('admin.faculties'); */

/* Route::resource('courses', CourseAdminController::class)->except('show')->names('admin.courses'); */

/* Route::resource('activities', ActivityAdminController::class)->names('admin.activitiess'); */
/* >>>>>>> 6e77047057419116d7ff8baf2079b444e83ff351 */
