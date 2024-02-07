<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TeacherPortal\TeacherPortalController;

Route::group(['middleware' => 'prevent-back-history'], function () {
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
          //employee registration all route
        });

});
