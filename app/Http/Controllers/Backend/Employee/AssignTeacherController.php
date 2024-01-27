<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignTeacher;
use App\Models\User;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;

class AssignTeacherController extends Controller
{
    public function AssignTeacherView()
    {
        $data['allData'] = AssignTeacher::select('class_id')->groupBy('class_id')->get();
        return view('backend.employee.assign_teacher.assign_teacher_view', $data);
    }
    public function AssignTeacherAdd()
    {
        $data['teachers'] = User::where('role', 'Teacher')->get();
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.employee.assign_teacher.assign_teacher_add', $data);
    }

    public function AssignTeacherStore(Request $request)
    {
        $teacherCount = count($request->teacher_id);
        if ($teacherCount != NULL) {
            for ($i = 0; $i < $teacherCount; $i++) {
                $assign_teacher = new AssignTeacher();
                $assign_teacher->teacher_id = $request->teacher_id[$i];
                $assign_teacher->class_id = $request->class_id;
                $assign_teacher->year_id = $request->year_id[$i];
                $assign_teacher->group_id = $request->group_id[$i];
                $assign_teacher->shift_id = $request->shift_id[$i];
                $assign_teacher->save();
            } // End For Loop
        } // End If Condition
        $notification = array(
            'message' => 'Teacher Assign Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.assign.view')->with($notification);
    }  // End Method

    public function AssignTeacherEdit($class_id)
    {
        $data['editData'] = AssignTeacher::where('class_id', $class_id)->orderBy('teacher_id', 'asc')->get();
        // dd($data['editData']->toArray());
        $data['teachers'] = User::where('role', 'Teacher')->get();
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        // dd($data);
        return view('backend.employee.assign_teacher.assign_teacher_edit', $data);
    }

    public function AssignTeacherUpdate(Request $request, $class_id)
    {
        if ($request->teacher_id == NULL) {
            $notification = array(
                'message' => 'Sorry You do not select any Teacher',
                'alert-type' => 'error'
            );
            return redirect()->route('teacher.assign.edit', $class_id)->with($notification);
        } else {
            $countTeacher = count($request->teacher_id);
            AssignTeacher::where('class_id', $class_id)->delete();
            for ($i = 0; $i < $countTeacher; $i++) {
                $assign_teacher = new AssignTeacher();
                $assign_teacher->teacher_id = $request->teacher_id[$i];
                $assign_teacher->class_id = $request->class_id;
                $assign_teacher->year_id = $request->year_id[$i];
                $assign_teacher->group_id = $request->group_id[$i];
                $assign_teacher->shift_id = $request->shift_id[$i];
                $assign_teacher->save();
            } // End For Loop
        } // end Else
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.assign.view')->with($notification);
    } // end Method
    public function AssignTeacherDetails($class_id)
    {
        
        $data['detailsData'] = AssignTeacher::where('class_id', $class_id)->orderBy('teacher_id', 'asc')->get();
        return view('backend.employee.assign_teacher.assign_teacher_details', $data);
    }
}
