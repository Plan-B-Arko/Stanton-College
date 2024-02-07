<?php

namespace App\Http\Controllers\Backend\TeacherPortal;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentBatch;
use App\Models\StudentMonth;
use App\Models\StudentSemester;
use App\Models\StudentAssignment;
use App\Models\AssignTeacher;
use Illuminate\Support\Facades\Auth;


class TeacherPortalController extends Controller
{
    //assignment add method start
    public function assignmentView(){

        $user = auth()->user();
        $assignedClasses = $user->assignedClasses;
        foreach($assignedClasses as $assignedClasse){
            $classId = $assignedClasse->class_id;
        }
        $teacherId = Auth::user()->id;
        // dd($teacherId);
        $assignments = AssignTeacher::where('teacher_id',$teacherId)->where('class_id',$classId)->with('assignments')->first();
        // dd($assignments);
        return view('backend.teacher_panel.assignment.assignment_view',compact('assignments'));
    }
    public function assignmentAdd(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['batches'] = StudentBatch::all();
        $data['months'] = StudentMonth::all();
        $data['semesters'] = StudentSemester::all();
        $data['subjects'] = SchoolSubject::all();
        return view('backend.teacher_panel.assignment.assignment_add',$data);
    }
    public function assignmentEdit($id){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['batches'] = StudentBatch::all();
        $data['months'] = StudentMonth::all();
        $data['semesters'] = StudentSemester::all();
        $data['subjects'] = SchoolSubject::all();
        $data['editData'] = StudentAssignment::find($id);
        // dd($data['editData']->toArray());
        return view('backend.teacher_panel.assignment.assignment_edit',$data);
    }

    public function assignmentStore(Request $request){
        $studnetAssignment = new StudentAssignment();
        $studnetAssignment->assignment_title = $request->assignment_title;
        $studnetAssignment->assignment_marks = $request->assignment_marks;
        $studnetAssignment->group_id = $request->group_id;
        $studnetAssignment->class_id = $request->class_id;
        $studnetAssignment->year_id = $request->year_id;
        $studnetAssignment->month_id = $request->month_id;
        $studnetAssignment->batch_id = $request->batch_id;
        $studnetAssignment->shift_id = $request->shift_id;
        $studnetAssignment->subject_id = $request->subject_id;
        $studnetAssignment->semester_id = $request->semester_id;
        $studnetAssignment->assignment_start_date = date('Y-m-d', strtotime($request->assignment_start_date));
        $studnetAssignment->assignment_end_date = date('Y-m-d', strtotime($request->assignment_end_date));
        $studnetAssignment->description = $request->description;
        $document = "";
            if ($request->hasFile('document') && $request->document->isValid()) {
                $document = time() . '.' . $request->document->extension();
                $request->document->move(public_path('upload/student_assignment_file'), $document);
                $studnetAssignment['document']=$document;
            }

            if ($request->file('picture')) {
                $file = $request->file('picture');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_assignment_image'), $filename);
                $studnetAssignment['picture'] = $filename;
            }
        $studnetAssignment->save();
        $notification = array(
            'message' => 'Assignment Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('assignment.view')->with($notification);
    }
    public function assignmentUpdate(Request $request, $id){

        $studnetAssignment = StudentAssignment::find($id);
        $studnetAssignment->assignment_title = $request->assignment_title;
        $studnetAssignment->assignment_marks = $request->assignment_marks;
        $studnetAssignment->group_id = $request->group_id;
        $studnetAssignment->class_id = $request->class_id;
        $studnetAssignment->year_id = $request->year_id;
        $studnetAssignment->month_id = $request->month_id;
        $studnetAssignment->batch_id = $request->batch_id;
        $studnetAssignment->shift_id = $request->shift_id;
        $studnetAssignment->subject_id = $request->subject_id;
        $studnetAssignment->semester_id = $request->semester_id;
        $studnetAssignment->assignment_start_date = date('Y-m-d', strtotime($request->assignment_start_date));
        $studnetAssignment->assignment_end_date = date('Y-m-d', strtotime($request->assignment_end_date));
        $studnetAssignment->description = $request->description;
        $document = "";
            if ($request->hasFile('document') && $request->document->isValid()) {
                $file_path = public_path('upload/student_assignment_file/'.$document);
                if(file_exists($file_path)){
                    unlink($file_path);
                }
                $document = time() . '.' . $request->document->extension();
                $request->document->move(public_path('upload/student_assignment_file'), $document);
                $studnetAssignment['document']=$document;
            }

            if ($request->file('picture')) {
                $file = $request->file('picture');
                @unlink(public_path('upload/student_assignment_image/' . $studnetAssignment->picture));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_assignment_image'), $filename);
                $studnetAssignment['picture'] = $filename;
            }
        $studnetAssignment->save();
        $notification = array(
            'message' => 'Assignment Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('assignment.view')->with($notification);
    }

    public function assignmentDelete($id)
    {


            $assignment = StudentAssignment::find($id);



            $assignmentDoc = $assignment->document;
            $file_path = public_path('upload/student_assignment_file/'. $assignmentDoc);
            if(file_exists($file_path)){
                unlink($file_path);
            }
            $assignmentPic = $assignment->picture;
            $file_path = public_path('upload/student_assignment_image/'. $assignmentPic);
            if(file_exists($file_path)){
                unlink($file_path);
            }

            try{

                $assignment->delete();





            } catch(\Exception $e){

            dd($e);


            }
            $notification = array(
                'message' => 'Deleted sucessfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    //assignment add method end
}
