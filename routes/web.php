<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;




Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    })->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest']);
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['guest']);
#activitylog
Route::get('/activities', [ActivityController::class, 'showActivities']);

    Route::middleware(['auth'])->group(function () {
        // Enroll in a course
        Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
#files
Route::post('/courses/{course}/files/upload', [App\Http\Controllers\FileController::class, 'upload'])->name('files.upload');
Route::get('/files/{id}/download', [App\Http\Controllers\FileController::class, 'download'])->name('files.download');
Route::delete('/files/{id}/delete', [App\Http\Controllers\FileController::class, 'delete'])->name('files.delete');
#submit
Route::post('/assignments/{assignment}/submit', [AssignmentController::class, 'submit'])->name('assignments.submit');

    #lecturers
    Route::get('/lecturers', 'App\Http\Controllers\LecturerController@index')->name('lecturer.index');
    Route::get('/lecturers/create', [App\Http\Controllers\LecturerController::class, 'create'])->name('lecturer.create');
    Route::post('/lecturers', [App\Http\Controllers\LecturerController::class, 'store'])->name('lecturer.store');

    Route::get('/lecturers', [App\Http\Controllers\LecturerController::class, 'index'])->name('lecturers.index');
    Route::get('/lecturers/{id}', [App\Http\Controllers\LecturerController::class, 'show'])->name('lecturer.show');
    Route::delete('/lecturers/{lecturer}', [App\Http\Controllers\LecturerController::class, 'destroy'])->name('lecturer.destroy');

    #users
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

  #language
  Route::get('/switch-lang/{lang}', [LanguageController::class, 'switchLang'])->name('switchLang');

    # Course routes
    Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('course.store');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('course.show');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

   # filter
   Route::post('/course/filter', [CourseController::class, 'filter'])->name('course.filter');

    # Assignment routes
    Route::get('courses/{course}/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
    Route::get('/courses/{course}/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
    Route::post('/courses/{course}/assignments', [AssignmentController::class, 'store'])->name('assignments.store');
    Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignments');
    Route::get('/assignments/{id}', [AssignmentController::class, 'show'])->name('assignments.show');

    Route::get('/assignments/{id}/edit', [AssignmentController::class, 'edit'])->name('assignments.edit');
    Route::put('/assignments/{id}', [AssignmentController::class, 'update'])->name('assignments.update');
    Route::delete('/assignments/{id}', [AssignmentController::class, 'destroy'])->name('assignments.destroy');
    Route::post('/assignments/{assignment}/submit', [AssignmentController::class, 'submit'])->name('assignments.submit');
    Route::get('/assignments/{id}/download', [AssignmentController::class, 'download'])->name('assignments.download');
    // ... 
Route::get('/myassignments', [CourseController::class, 'myAssignments'])->name('myassignments');

});
    Route::middleware(['auth'])->group(function () {
        // Enroll in a course
        Route::get('/mycourses', [CourseController::class, 'showEnrolledCourses'])->name('mycourses.show');
        Route::get('/course/{course}/mycourse', [CourseController::class, 'myCourse'])->name('course.mycourse');
        Route::post('/courses/{course}/leave', [CourseController::class, 'leaveCourse'])->name('courses.leave');

    });
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('course.enroll');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
