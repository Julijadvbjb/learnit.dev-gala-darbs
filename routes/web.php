<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssignmentController;

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

    Route::middleware(['auth'])->group(function () {
        // Enroll in a course
        Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
    
        // Show and submit assignments
        Route::get('/courses/{course}/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
        Route::get('/assignments/{assignment}', [AssignmentController::class, 'show'])->name('assignments.show');
        Route::post('/assignments/{assignment}/submit', [AssignmentController::class, 'submit'])->name('assignments.submit');
    });
    
    #lecturers
    Route::get('/lecturers', 'App\Http\Controllers\LecturerController@index')->name('lecturer.index');

    Route::get('/lecturers', [App\Http\Controllers\LecturerController::class, 'index'])->name('lecturers.index');
    Route::get('/lecturers/{id}', [App\Http\Controllers\LecturerController::class, 'show'])->name('lecturer.show');
    Route::delete('/lecturers/{lecturer}', [App\Http\Controllers\LecturerController::class, 'destroy'])->name('lecturer.destroy');
    Route::get('/lecturers/create', [App\Http\Controllers\LecturerController::class, 'create'])->name('lecturer.create');

    #users
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');


    # Course routes
    Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('course.store');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('course.show');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('course.destroy');

    # Assignment routes
    Route::get('/courses/{id}/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
    Route::get('/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
    Route::post('/assignments', [AssignmentController::class, 'store'])->name('assignments.store');
    Route::get('/assignments/{id}/edit', [AssignmentController::class, 'edit'])->name('assignments.edit');
    Route::put('/assignments/{id}', [AssignmentController::class, 'update'])->name('assignments.update');
    Route::delete('/assignments/{id}', [AssignmentController::class, 'destroy'])->name('assignments.destroy');

    Route::middleware(['auth'])->group(function () {
        // Enroll in a course
        Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
        Route::get('/mycourses', [CourseController::class, 'showEnrolledCourses'])->name('mycourses.show');
        Route::get('/course/{id}/mycourse', [CourseController::class, 'myCourse'])->name('course.mycourse');

        // Show and submit assignments
        Route::get('/courses/{course}/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
        Route::get('/assignments/{assignment}', [AssignmentController::class, 'show'])->name('assignments.show');
        Route::post('/assignments/{assignment}/submit', [AssignmentController::class, 'submit'])->name('assignments.submit');
    });
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('course.enroll');

});

require __DIR__.'/auth.php';
