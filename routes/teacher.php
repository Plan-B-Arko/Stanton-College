<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TeacherPortal\TeacherPortalController;

Route::group(['middleware' => 'prevent-back-history'], function () {
    // teacher dashboard
    Route::middleware(['auth:sanctum,web', 'verified'])->get('/teacher_dashboard', function () {
        return view('backend.teacher_panel.dashboard.index');
    })->name('teacher.dashboard');


    // Route::prefix('/teacher/portal')->group(function(){
    //     Route::get('/mysubject/view',[TeacherPortalController::class,'mySubjectView'])->name('mysubject.view');
    //     });
});
