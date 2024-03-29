<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentMonth;
use App\Models\StudentSemester;
use App\Models\StudentBatch;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentRegController extends Controller
{
    //
    public function StudentRegView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['batches'] = StudentBatch::all();
        $data['months'] = StudentMonth::all();
        $data['semesters'] = StudentSemester::all();
        $data['batch_id'] = StudentBatch::orderBy('id', 'desc')->first()->id;
        $data['month_id'] = StudentMonth::orderBy('id', 'desc')->first()->id;
        $data['semester_id'] = StudentSemester::orderBy('id', 'desc')->first()->id;
        $data['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        // dd($data['class_id']);
        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('semester_id', $data['semester_id'])->where('month_id', $data['month_id'])->where('batch_id', $data['batch_id'])->where('class_id', $data['class_id'])->get();
        return view('backend.student.student_reg.student_view', $data);
    }
    public function StudentClassYearWise(Request $request)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['batches'] = StudentBatch::all();
        $data['months'] = StudentMonth::all();
        $data['semesters'] = StudentSemester::all();
        $data['semester_id'] = $request->semester_id;
        $data['batch_id'] = $request->batch_id;
        $data['month_id'] = $request->month_id;
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['search'] = $request->search;
        $data['allData'] = AssignStudent::where('year_id', $request->year_id)->where('month_id', $request->month_id)->where('semester_id',  $request->semester_id)->where('batch_id', $request->batch_id)->where('class_id', $request->class_id)->get();
        // dd($data['allData']->toArray());
        return view('backend.student.student_reg.student_view', $data);
    }
    public function StudentRegAdd()
    {

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['batches'] = StudentBatch::all();
        $data['months'] = StudentMonth::all();
        $data['semesters'] = StudentSemester::all();
        return view('backend.student.student_reg.student_add', $data);
    }
    public function StudentRegStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $validateData = $request->validate([
                'discount'=>'required|integer',
            ]);
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();
            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } // end else
            $final_id_no = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->role = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->month_id = $request->month_id;
            $assign_student->semester_id = $request->semester_id;
            $assign_student->batch_id = $request->batch_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->registered_date_semester_wise = $request->registered_date_semester_wise;
            $assign_student->save();
            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });
        $notification = array(
            'message' => 'Student Registration Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    } // End Method
    public function StudentRegEdit($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['batches'] = StudentBatch::all();
        $data['months'] = StudentMonth::all();
        $data['semesters'] = StudentSemester::all();
        $data['editData'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        // dd($data['editData']->toArray());
        return view('backend.student.student_reg.student_edit', $data);
    }
    public function StudentRegUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {
            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->blood_group = $request->blood_group;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/user_images/' . $user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
            $assign_student = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();
            $assign_student->year_id = $request->year_id;
            $assign_student->month_id = $request->month_id;
            $assign_student->semester_id = $request->semester_id;
            $assign_student->batch_id = $request->batch_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->registered_date_semester_wise = $request->registered_date_semester_wise;
            $assign_student->save();
            $discount_student = DiscountStudent::where('assign_student_id', $request->id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });
        $notification = array(
            'message' => 'Student Registration Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    } // End Method
    public function StudentRegPromotion($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['batches'] = StudentBatch::all();
        $data['months'] = StudentMonth::all();
        $data['semesters'] = StudentSemester::all();
        $data['editData'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        return view('backend.student.student_reg.student_promotion', $data);
    }
    public function StudentUpdatePromotion(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {
            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/user_images/' . $user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->month_id = $request->month_id;
            $assign_student->semester_id = $request->semester_id;
            $assign_student->batch_id = $request->batch_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->registered_date_semester_wise = $request->registered_date_semester_wise;
            $assign_student->save();
            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });
        $notification = array(
            'message' => 'Student Promotion Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    } // End Method
    public function StudentRegDetails($student_id)
    {
        $data['details'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        $pdf = Pdf::loadView('backend.student.student_reg.student_details_pdf', $data);
        return $pdf->stream('document.pdf');
    }
}
