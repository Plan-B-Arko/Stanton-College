<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\StudentPortal\StudentPortalController;

Route::group(['middleware' => 'prevent-back-history'], function () {

// student dashboard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/student_dashboard', function () {
    return view('backend.student_panel.dashboard.index');
})->name('student.dashboard');

Route::prefix('/student/portal')->group(function(){
Route::get('/mysubject/view',[StudentPortalController::class,'mySubjectView'])->name('mysubject.view');
});



});
