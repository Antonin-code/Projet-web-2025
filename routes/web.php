<?php

use App\Http\Controllers\CohortController;
use App\Http\Controllers\CommonLifeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Redirect the root path to /dashboard
Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {

         Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
         Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware('verified')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Cohorts
        Route::get('/cohorts', [CohortController::class, 'index'])->name('cohort.index');
        Route::get('/cohort/{cohort}', [CohortController::class, 'show'])->name('cohort.show');

        // Teachers
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');

        // Students
        Route::get('/students', [StudentController::class, 'index'])->name('student.index');

        // Knowledge
        Route::get('knowledge', [KnowledgeController::class, 'index'])->name('knowledge.index');

        // Groups
        Route::get('groups', [GroupController::class, 'index'])->name('group.index');

        // Retro
        route::get('retros', [RetroController::class, 'index'])->name('retro.index');

        // Common life
        Route::get('common-life', [CommonLifeController::class, 'index'])->name('common-life.index');

        //route to do the formular
        Route::view('formulaire', 'index.blade');


        //Students
        //route to destroy students
        Route::post('students/{student}', [StudentController::class, 'deleteStudents'])->name('student.destroy');
        //route to update students
        Route::put('/users/{user}', [StudentController::class, 'update'])->name('student.update');
        //Route to store students
             Route::post('students', [StudentController::class, 'store'])->name('student.store');


        //Teachers
        //route to destroy teacher
        Route::post('teacher/{teacher}', [TeacherController::class, 'deleteTeachers'])->name('teacher.destroy');
        //route to update teacher
        Route::put('/teachers/{teachers}', [TeacherController::class, 'updateTeacher'])->name('teacher.update');
        //Route to store teachers
        Route::post('teacher', [TeacherController::class, 'store'])->name('teacher.store');


        //Cohorts
        //route to update cohort
             Route::put('/user/{user}', [CohortController ::class, 'updateCohorts'])->name('cohort.updates');
             //route to destroy cohorts
        Route::post('cohort/{cohort}', [CohortController ::class, 'deleteCohorts'])->name('cohort.destroy');
        //Route to store cohort
        Route::post('cohort', [CohortController ::class, 'store'])->name('cohort.store');
        //Route to view cohort form
             Route::get('/cohort/form', [CohortController::class, 'form'])->name('cohort.form');
             Route::post('/cohort/{cohort}/add', [CohortController::class, 'cohortAdd'])->name('cohort.add');
             Route::post('/cohort/{id}/del', [CohortController::class, 'cohortDel'])->name('cohort.del');


         });

});

require __DIR__.'/auth.php';
