<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\Employee\AssignTeacherController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentMonthController;
use App\Http\Controllers\Backend\Setup\StudentBatchController;
use App\Http\Controllers\Backend\Setup\StudentSemesterController;
use App\Http\Controllers\Backend\Setup\ClassRoomController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Marks\GradeController;
use App\Http\controllers\Backend\DefaultController;
use App\Http\controllers\Backend\Account\StudentFeeController;
use App\Http\controllers\Backend\Account\AccountSalaryController;
use App\Http\controllers\Backend\Account\OtherCostController;
use App\Http\controllers\Backend\Report\ProfitController;
use App\Http\controllers\Backend\Report\MarkSheetController;
use App\Http\controllers\Backend\Report\AttendanceReportController;
use App\Http\controllers\Backend\Report\ResultReportController;
use App\Http\controllers\Backend\Parents\ParentsController;


Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    // admin dashboard
    Route::middleware(['auth:sanctum,web', 'verified'])->get('/admin_dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
    Route::group(['middleware' => 'auth'], function () {
        // User Management route start
        Route::prefix('users')->group(function () {
            Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
            Route::get('/add', [UserController::class, 'AddUser'])->name('user.add');
            Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
            Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
            Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
            Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
        });
        // user profile and change password route start
        Route::prefix('profile')->group(function () {
            Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
            Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
            Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
            Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
            Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
        });
        // setups route start here
        Route::prefix('setups')->group(function () {
            // student class route
            Route::get('/student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
            Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
            Route::post('/student/class/store', [StudentClassController::class, 'StoreStudentClass'])->name('store.student.class');
            Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
            Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
            Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');
            // student year route
            Route::get('/student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
            Route::get('/student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
            Route::post('/student/year/store', [StudentYearController::class, 'StoreStudentYear'])->name('store.student.year');
            Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
            Route::post('/student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');
            Route::get('/student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');
            // student month route
            Route::get('/student/month/view', [StudentMonthController::class, 'ViewStudentMonth'])->name('student.month.view');
            Route::get('/student/month/add', [StudentMonthController::class, 'StudentMonthAdd'])->name('student.month.add');
            Route::post('/student/month/store', [StudentMonthController::class, 'StoreStudentMonth'])->name('store.student.month');
            Route::get('/student/month/edit/{id}', [StudentMonthController::class, 'StudentMonthEdit'])->name('student.month.edit');
            Route::post('/student/month/update/{id}', [StudentMonthController::class, 'StudentMonthUpdate'])->name('update.student.month');
            Route::get('/student/month/delete/{id}', [StudentMonthController::class, 'StudentMonthDelete'])->name('student.month.delete');
            // student Batch route
            Route::get('/student/batch/view', [StudentBatchController::class, 'ViewStudentBatch'])->name('student.batch.view');
            Route::get('/student/batch/add', [StudentBatchController::class, 'StudentBatchAdd'])->name('student.batch.add');
            Route::post('/student/batch/store', [StudentBatchController::class, 'StoreStudentBatch'])->name('store.student.batch');
            Route::get('/student/batch/edit/{id}', [StudentBatchController::class, 'StudentBatchEdit'])->name('student.batch.edit');
            Route::post('/student/batch/update/{id}', [StudentBatchController::class, 'StudentBatchUpdate'])->name('update.student.batch');
            Route::get('/student/batch/delete/{id}', [StudentBatchController::class, 'StudentBatchDelete'])->name('student.batch.delete');
            // student Semester route
            Route::get('/student/semester/view', [StudentSemesterController::class, 'ViewStudentSemester'])->name('student.semester.view');
            Route::get('/student/semester/add', [StudentSemesterController::class, 'StudentSemesterAdd'])->name('student.semester.add');
            Route::post('/student/semester/store', [StudentSemesterController::class, 'StoreStudentSemester'])->name('store.student.semester');
            Route::get('/student/semester/edit/{id}', [StudentSemesterController::class, 'StudentSemesterEdit'])->name('student.semester.edit');
            Route::post('/student/semester/update/{id}', [StudentSemesterController::class, 'StudentSemesterUpdate'])->name('update.student.semester');
            Route::get('/student/semester/delete/{id}', [StudentSemesterController::class, 'StudentSemesterDelete'])->name('student.semester.delete');
            // class room route
            Route::get('/class/room/view', [ClassRoomController::class, 'ViewClassRoom'])->name('class.room.view');
            Route::get('/class/room/add', [ClassRoomController::class, 'ClassRoomAdd'])->name('class.room.add');
            Route::post('/class/room/store', [ClassRoomController::class, 'StoreClassRoom'])->name('store.class.room');
            Route::get('/class/room/edit/{id}', [ClassRoomController::class, 'ClassRoomEdit'])->name('class.room.edit');
            Route::post('/class/room/update/{id}', [ClassRoomController::class, 'ClassRoomUpdate'])->name('update.class.room');
            Route::get('/class/room/delete/{id}', [ClassRoomController::class, 'ClassRoomDelete'])->name('class.room.delete');
            // student group route
            Route::get('/student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
            Route::get('/student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
            Route::post('/student/group/store', [StudentGroupController::class, 'StoreStudentGroup'])->name('store.student.group');
            Route::get('/student/groupshift/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
            Route::post('/student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('update.student.group');
            Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');
            // student shift route
            Route::get('/student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
            Route::get('/student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');
            Route::post('/student/shift/store', [StudentShiftController::class, 'StoreStudentShift'])->name('store.student.shift');
            Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
            Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('update.student.shift');
            Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');
            // fee category route
            Route::get('/fee/category/view', [FeeCategoryController::class, 'ViewFeeCategory'])->name('fee.category.view');
            Route::get('/fee/category/add', [FeeCategoryController::class, 'FeeCategoryAdd'])->name('fee.category.add');
            Route::post('/fee/category/store', [FeeCategoryController::class, 'StoreFeeCategory'])->name('store.fee.category');
            Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit'])->name('fee.category.edit');
            Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('update.fee.category');
            Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');
            // fee category amount route
            Route::get('/fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
            Route::get('/fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
            Route::post('/fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');
            Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
            Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');
            Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');
            // Exam Type Routes
            Route::get('/exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
            Route::get('/exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');
            Route::post('/exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('store.exam.type');
            Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
            Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('update.exam.type');
            Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');
            // School Subject All Routes
            Route::get('/school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');
            Route::get('/school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])->name('school.subject.add');
            Route::post('/school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('store.school.subject');
            Route::get('/school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');
            Route::post('/school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('update.school.subject');
            Route::get('/school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');
            // Assign Subject Routes
            Route::get('/assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
            Route::get('/assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
            Route::post('/assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');
            Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
            Route::post('/assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');
            Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');
            // Designation All Routes
            Route::get('/designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
            Route::get('/designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');
            Route::post('/designation/store', [DesignationController::class, 'DesignationStore'])->name('store.designation');
            Route::get('/designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
            Route::post('/designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('update.designation');
            Route::get('/designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');
        });
        /// Student Registration Routes
        Route::prefix('/students')->group(function () {
            Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
            Route::get('/reg/Add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
            Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
            Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
            Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
            Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
            Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
            Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
            Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');
            // Student Roll Generate Routes
            Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
            Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
            Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');
            // Registration Fee Routes
            Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');
            Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
            Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');
            // Monthly Fee Routes
            Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
            Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
            Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');
            // Exam Fee Routes
            Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
            Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
            Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');
        });
        // parents all route
        Route::prefix('/parents')->group(function(){
            // parents add all route
            Route::get('/reg/view', [ParentsController::class, 'ParentsView'])->name('parents.registration.view');
            Route::get('/reg/add', [ParentsController::class, 'ParentsAdd'])->name('parents.registration.add');
            Route::post('/reg/store', [ParentsController::class, 'ParentsStore'])->name('store.parents.registration');
            Route::get('/reg/edit/{id}', [ParentsController::class, 'ParentsEdit'])->name('parents.registration.edit');
            Route::post('/reg/update/{id}', [ParentsController::class, 'ParentsUpdate'])->name('update.parents.registration');
            Route::get('/reg/details/delete/{id}', [ParentsController::class, 'ParentsDelete'])->name('parents.registration.delete');

        });
        // employee route
        Route::prefix('/employees')->group(function () {
            //employee registration all route
            Route::get('/reg/employee/view', [EmployeeRegController::class, 'EmployeeView'])->name('employee.registration.view');
            Route::get('/reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');
            Route::post('/reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');
            Route::get('/reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.registration.edit');
            Route::post('/reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');
            Route::get('/reg/employee/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.registration.details');
            // Employee Salary All Routes
            Route::get('/salary/employee/view', [EmployeeSalaryController::class, 'SalaryView'])->name('employee.salary.view');
            Route::get('/salary/employee/increment/{id}', [EmployeeSalaryController::class, 'SalaryIncrement'])->name('employee.salary.increment');
            Route::post('/salary/employee/store/{id}', [EmployeeSalaryController::class, 'SalaryStore'])->name('update.increment.store');
            Route::get('/salary/employee/details/{id}', [EmployeeSalaryController::class, 'SalaryDetails'])->name('employee.salary.details');
            // Employee Leave All Routes
            Route::get('/leave/employee/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');
            Route::get('/leave/employee/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');
            Route::post('/leave/employee/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');
            Route::get('/leave/employee/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');
            Route::post('/leave/employee/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');
            Route::get('/leave/employee/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');
            // Employee Attendance all route
            Route::get('/attendance/employee/view', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');
            Route::get('/attendance/employee/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');
            Route::post('/attendance/employee/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');
            Route::get('/attendance/employee/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');
            Route::get('/attendance/employee/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');
            //employee monthly salary
            // Employee Monthly Salary All Routes
            Route::get('/monthly/salary/view', [MonthlySalaryController::class, 'MonthlySalaryView'])->name('employee.monthly.salary');
            Route::get('/monthly/salary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly.salary.get');
            Route::get('/monthly/salary/payslip/{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');
        });
        Route::prefix('/teacher/assign')->group(function(){
            Route::get('/view', [AssignTeacherController::class, 'AssignTeacherView'])->name('teacher.assign.view');
            Route::get('/add', [AssignTeacherController::class, 'AssignTeacherAdd'])->name('teacher.assign.add');
            Route::post('/store', [AssignTeacherController::class, 'AssignTeacherStore'])->name('teacher.assign.store');
            Route::get('/edit/{class_id}', [AssignTeacherController::class, 'AssignTeacherEdit'])->name('teacher.assign.edit');
            Route::post('/update/{class_id}', [AssignTeacherController::class, 'AssignTeacherUpdate'])->name('teacher.assign.update');
            Route::get('/details/{class_id}', [AssignTeacherController::class, 'AssignTeacherDetails'])->name('teacher.assign.details');
        });
        // marks Management Route
        Route::prefix('/marks')->group(function () {
            // Mark entry route.
            Route::get('/marks/entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');
            Route::post('/marks/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store');
            Route::get('/marks/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit');
            Route::get('/marks/getstudents/edit', [MarksController::class, 'MarksEditGetStudents'])->name('student.edit.getstudents');
            Route::post('/marks/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');
            //marks entry grade route
            Route::get('/marks/grade/view', [GradeController::class, 'MarksGradeView'])->name('marks.entry.grade');
            Route::get('/marks/grade/add', [GradeController::class, 'MarksGradeAdd'])->name('marks.grade.add');
            Route::post('/marks/grade/store', [GradeController::class, 'MarksGradeStore'])->name('store.marks.grade');
            Route::get('/marks/grade/edit/{id}', [GradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');
            Route::post('/marks/grade/update/{id}', [GradeController::class, 'MarksGradeUpdate'])->name('update.marks.grade');
        });
        // default controller outside of the prefix
        Route::get('/marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
        Route::get('/student/marks/getstudents', [DefaultController::class, 'GetStudents'])->name('student.marks.getstudents');
        // end default route
        // Account Management all Route
        Route::prefix('/accounts')->group(function () {
            // student fee all route
            Route::get('/student/fee/view', [StudentFeeController::class, 'StudentFeeView'])->name('student.fee.view');
            Route::get('/student/fee/add', [StudentFeeController::class, 'StudentFeeAdd'])->name('student.fee.add');
            Route::get('student/fee/getstudent', [StudentFeeController::class, 'StudentFeeGetStudent'])->name('account.fee.getstudent');
            Route::post('student/fee/store', [StudentFeeController::class, 'StudentFeeStore'])->name('account.fee.store');
            // employee salary routees
            Route::get('/account/salary/view', [AccountSalaryController::class, 'AccountSalaryView'])->name('account.salary.view');
            Route::get('/account/salary/add', [AccountSalaryController::class, 'AccountSalaryAdd'])->name('account.salary.add');
            Route::get('/account/salary/getemployee', [AccountSalaryController::class, 'AccountSalaryGetEmployee'])->name('account.salary.getemployee');
            Route::post('/account/salary/store', [AccountSalaryController::class, 'AccountSalaryStore'])->name('account.salary.store');
            // ohters cost all route
            Route::get('/other/cost/view', [OtherCostController::class, 'OtherCostView'])->name('other.cost.view');
            Route::get('/other/cost/add', [OtherCostController::class, 'OtherCostAdd'])->name('other.cost.add');
            Route::post('/other/cost/store', [OtherCostController::class, 'OtherCostStore'])->name('store.other.cost');
            Route::get('/other/cost/edit/{id}', [OtherCostController::class, 'OtherCostEdit'])->name('edit.other.cost');
            Route::post('/other/cost/update/{id}', [OtherCostController::class, 'OtherCostUpdate'])->name('update.other.cost');
            Route::get('/other/cost/delete/{id}', [OtherCostController::class, 'OtherCostDelete'])->name('delete.other.cost');
        });
        // Reports Management All Route
        Route::prefix('/reports')->group(function () {
            // monthly profit report all route
            Route::get('/monthly/profit/view', [ProfitController::class, 'MonthlyProfitView'])->name('monthly.profit.view');
            Route::get('/monthly/profit/datewise', [ProfitController::class, 'MonthlyProfitDatewise'])->name('report.profit.datewise.get');
            Route::get('/monthly/profit/pdf', [ProfitController::class, 'MonthlyProfitPdf'])->name('report.profit.pdf');
            //marksheet generate all route
            Route::get('/marksheet/generate/view', [MarkSheetController::class, 'MarkSheetView'])->name('marksheet.generate.view');
            Route::get('/marksheet/generate/get', [MarkSheetController::class, 'MarkSheetGet'])->name('report.marksheet.get');
            //attendance report all routes
            Route::get('/attendance/report/view', [AttendanceReportController::class, 'AttendanceReportView'])->name('attendance.report.view');
            Route::get('/report/attendance/get', [AttendanceReportController::class, 'AttendanceReportGet'])->name('report.attendance.get');
            // Student Result Report all routes
            Route::get('/student/result/view', [ResultReportController::class, 'ResultView'])->name('student.result.view');
            Route::get('/student/result/get', [ResultReportController::class, 'ResultGet'])->name('report.student.result.get');
            //Student ID Card Routes
            Route::get('/student/idcard/view', [ResultReportController::class, 'IdcardView'])->name('student.idcard.view');
            Route::get('/student/idcard/get', [ResultReportController::class, 'IdcardGet'])->name('report.student.idcard.get');
        });
    }); //end middleware auth route
});// prevent back middleware end
