<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\StudentPortal\StudentPortalController;

// Route::group(['middleware' => 'prevent-back-history'], function () {
 Route::group(['middleware' => 'auth'], function () {

Route::get('/student_dashboard',[StudentPortalController::class,'studentDashboard'])->name('student.dashboard');

Route::prefix('/student/portal')->group(function(){
Route::get('/mysubject/view',[StudentPortalController::class,'mySubjectView'])->name('mysubject.view');
Route::get('/first/semester/assignment/view',[StudentPortalController::class,'firstSemesterAssignmentView'])->name('first.semester.assignment.view');
});
Route::prefix('/student/portal/assignment')->group(function(){
Route::get('/first/semester/view',[StudentPortalController::class,'firstSemesterAssignmentView'])->name('first.semester.assignment.view');
Route::get('/second/semester/view',[StudentPortalController::class,'secondSemesterAssignmentView'])->name('second.semester.assignment.view');
Route::get('/third/semester/view',[StudentPortalController::class,'thirdSemesterAssignmentView'])->name('third.semester.assignment.view');
Route::get('/fourth/semester/view',[StudentPortalController::class,'fourthSemesterAssignmentView'])->name('fourth.semester.assignment.view');
Route::get('/details/view/{id}',[StudentPortalController::class,'assignmentDetailsView'])->name('assignment.details.view');
Route::get('/picture/show/{id}',[StudentPortalController::class,'assignmentPictureShow'])->name('assignment.picture.show');
Route::get('/picture/download/{picture}',[StudentPortalController::class,'assignmentPictureDownload'])->name('assignment.picture.download');
Route::get('/document/show/{id}',[StudentPortalController::class,'assignmentDocumentShow'])->name('assignment.document.show');
Route::get('/document/download/{document}',[StudentPortalController::class,'assignmentDocumentDownload'])->name('assignment.document.download');
});


});
// });
