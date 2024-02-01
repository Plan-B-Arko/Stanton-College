<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentMonth;

class StudentMonthController extends Controller
{
    public function ViewStudentMonth()
    {
        $data['allData'] = StudentMonth::all();
        return view('backend.setup.student_month.view_student_month', $data);
    }
    public function StudentMonthAdd()

    {
        return view('backend.setup.student_month.add_student_month');
    }
    public function StoreStudentMonth(Request $request)
    {
        $validateData = $request->validate([
            'month_name' => 'required|unique:student_months,month_name',
        ]);
        $data = new StudentMonth();
        $data->month_name = $request->month_name;
        $data->save();
        $notification = array(
            'message' => 'Student Month Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.month.view')->with($notification);
    }
    public function StudentMonthEdit($id)
    {
        $editData = StudentMonth::find($id);
        return view('backend.setup.student_month.edit_student_month', compact('editData'));
    }
    public function StudentMonthUpdate(Request $request, $id)
    {
        $data = StudentMonth::find($id);
        $validateData = $request->validate([
            'month_name' => 'required|unique:student_months,month_name,'. $data->id
        ]);
        $data->month_name = $request->month_name;
        $data->save();
        $notification = array(
            'message' => 'Student Month Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('student.month.view')->with($notification);
    }
    public function StudentMonthDelete($id)
    {
        $user = StudentMonth::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Student Month Deleted Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->route('student.month.view')->with($notification);
    }
}
