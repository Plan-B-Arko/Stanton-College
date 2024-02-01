<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSemester;


class StudentSemesterController extends Controller
{
    public function ViewStudentSemester()
    {
        $data['allData'] = StudentSemester::all();
        return view('backend.setup.student_semester.view_student_semester', $data);
    }
    public function StudentSemesterAdd()

    {
        return view('backend.setup.student_semester.add_student_semester');
    }
    public function StoreStudentSemester(Request $request)
    {
        $validateData = $request->validate([
            'semester_name' => 'required|unique:student_semesters,semester_name',
        ]);
        $data = new StudentSemester();
        $data->semester_name = $request->semester_name;
        $data->save();
        $notification = array(
            'message' => 'Student Semester Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.semester.view')->with($notification);
    }
    public function StudentSemesterEdit($id)
    {
        $editData = StudentSemester::find($id);
        return view('backend.setup.student_semester.edit_student_semester', compact('editData'));
    }
    public function StudentSemesterUpdate(Request $request, $id)
    {
        $data = StudentSemester::find($id);
        $validateData = $request->validate([
            'semester_name' => 'required|unique:student_semesters,semester_name,'. $data->id
        ]);
        $data->semester_name = $request->semester_name;
        $data->save();
        $notification = array(
            'message' => 'Student Semester Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('student.semester.view')->with($notification);
    }
    public function StudentSemesterDelete($id)
    {
        $user = StudentSemester::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Student Semester Deleted Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->route('student.semester.view')->with($notification);
    }
}
