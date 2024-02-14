<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TeacherPortal\TeacherPortalController;

// Route::group(['middleware' => 'prevent-back-history'], function () {
    // teacher dashboard
    Route::middleware(['auth:sanctum,web', 'verified'])->get('/teacher_dashboard', function () {
        return view('backend.teacher_panel.dashboard.index');
    })->name('teacher.dashboard');


    Route::prefix('/teacher/portal')->group(function(){
        // assginment all route start
        Route::get('/assignment/view', [TeacherPortalController::class, 'assignmentView'])->name('assignment.view');
        Route::get('/assignment/add', [TeacherPortalController::class, 'assignmentAdd'])->name('assignment.add');
        Route::post('/assignment/store', [TeacherPortalController::class, 'assignmentStore'])->name('store.assignment');
        Route::get('/assignment/edit/{id}', [TeacherPortalController::class, 'assignmentEdit'])->name('assignment.edit');
        Route::post('/assignment/update/{id}', [TeacherPortalController::class, 'assignmentUpdate'])->name('update.assignment');
        Route::get('/assignment/delete/{id}', [TeacherPortalController::class, 'assignmentDelete'])->name('assignment.delete');
          //assignment all route end
        // student class routine all route start
        Route::get('/student/class/routine/view', [TeacherPortalController::class, 'studentClassRoutineView'])->name('student.class.routine.view');
        Route::get('/student/class/routine/add', [TeacherPortalController::class, 'studentClassRoutineAdd'])->name('student.class.routine.add');
        Route::post('/student/class/routine/store', [TeacherPortalController::class, 'studentClassRoutineStore'])->name('store.student.class.routine');
        Route::get('/student/class/routine/edit/{id}', [TeacherPortalController::class, 'studentClassRoutineEdit'])->name('student.class.routine.edit');
        Route::post('/student/class/routine/update/{id}', [TeacherPortalController::class, 'studentClassRoutineUpdate'])->name('update.student.class.routine');
        Route::get('/student/class/routine/delete/{id}', [TeacherPortalController::class, 'studentClassRoutineDelete'])->name('student.class.routine.delete');
          //student class routine all route end
        });
    Route::prefix('/teacher/portal/student/class/routine')->group(function(){
        // student class routine all route start
        Route::get('/view', [TeacherPortalController::class, 'studentClassRoutineView'])->name('student.class.routine.view');
        Route::get('/add', [TeacherPortalController::class, 'studentClassRoutineAdd'])->name('student.class.routine.add');
        Route::post('/store', [TeacherPortalController::class, 'studentClassRoutineStore'])->name('store.student.class.routine');
        Route::get('/edit/{id}', [TeacherPortalController::class, 'studentClassRoutineEdit'])->name('student.class.routine.edit');
        Route::post('/update/{id}', [TeacherPortalController::class, 'studentClassRoutineUpdate'])->name('update.student.class.routine');
        Route::get('/delete/{id}', [TeacherPortalController::class, 'studentClassRoutineDelete'])->name('student.class.routine.delete');
        Route::get('/file/show/{id}', [TeacherPortalController::class, 'studentClassRoutineFileShow'])->name('student.class.routine.file.show');
        Route::get('/file/download/{routine_file}', [TeacherPortalController::class, 'studentClassRoutineFileDownload'])->name('student.class.routine.file.download');
          //student class routine all route end
        });

// });
