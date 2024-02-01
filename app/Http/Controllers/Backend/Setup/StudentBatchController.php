<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentBatch;

class StudentBatchController extends Controller
{
    public function ViewStudentBatch()
    {
        $data['allData'] = StudentBatch::all();
        return view('backend.setup.student_batch.view_student_batch', $data);
    }
    public function StudentBatchAdd()

    {
        return view('backend.setup.student_batch.add_student_batch');
    }
    public function StoreStudentBatch(Request $request)
    {
        $validateData = $request->validate([
            'batch_name' => 'required|unique:student_batches,batch_name',
        ]);
        $data = new StudentBatch();
        $data->batch_name = $request->batch_name;
        $data->save();
        $notification = array(
            'message' => 'Student Batch Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.batch.view')->with($notification);
    }
    public function StudentBatchEdit($id)
    {
        $editData = StudentBatch::find($id);
        return view('backend.setup.student_batch.edit_student_batch', compact('editData'));
    }
    public function StudentBatchUpdate(Request $request, $id)
    {
        $data = StudentBatch::find($id);
        $validateData = $request->validate([
            'batch_name' => 'required|unique:student_batches,batch_name,'. $data->id
        ]);
        $data->batch_name = $request->batch_name;
        $data->save();
        $notification = array(
            'message' => 'Student Batch Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('student.batch.view')->with($notification);
    }
    public function StudentBatchDelete($id)
    {
        $user = StudentBatch::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Student Batch Deleted Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->route('student.batch.view')->with($notification);
    }
}
