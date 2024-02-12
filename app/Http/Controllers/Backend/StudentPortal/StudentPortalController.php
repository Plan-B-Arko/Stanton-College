<?php

namespace App\Http\Controllers\Backend\StudentPortal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentAssignment;
use Illuminate\Support\Facades\Auth;

class StudentPortalController extends Controller
{
    public function mySubjectView(){
        $studnetId = Auth::user()->id;
        $data['allData'] = AssignStudent::with('assignedSubjects.subject')->where('student_id',$studnetId)->get();
        // dd($data['allData']->toArray());
        return view('backend.student_panel.sd_mysubject.mysubject_view', $data);
    }
    // start student dashboard code
    public function studentDashboard()
    {
        $id = Auth::user()->id;
        $data['user'] = AssignStudent::/* with(['student'/* ,'student_class','student_year','group','shift' ]) */where('student_id',$id)->first();
        // dd($data['user']->toArray());
        return view('backend.student_panel.dashboard.index', $data);
    }
    // end student dashboard code
    // start semester wise data show metho
    public function firstSemesterAssignmentView(){
        $studnetId = Auth::user()->id;
        $semesterId =AssignStudent::where('student_id',$studnetId)->value('semester_id');
        $yearId =AssignStudent::where('student_id',$studnetId)->value('year_id');
        $batchId =AssignStudent::where('student_id',$studnetId)->value('batch_id');
        $classId =AssignStudent::where('student_id',$studnetId)->value('class_id');
        $shiftId =AssignStudent::where('student_id',$studnetId)->value('shift_id');
        $groupId =AssignStudent::where('student_id',$studnetId)->value('group_id');
        $monthId =AssignStudent::where('student_id',$studnetId)->value('month_id');
        $firstSemesterAssignments = StudentAssignment::where('semester_id',$semesterId)->where('year_id',$yearId)->where('batch_id',$batchId)->where('class_id',$classId)->where('shift_id',$shiftId)->where('group_id',$groupId)->where('month_id',$monthId)->get();
        // dd( $firstSemesterAssignments );
        return view('backend.student_panel.sd_myassignment.first_semester_assignment_view',compact('firstSemesterAssignments'));
    }

    // Second Semester data show metho start
    public function secondSemesterAssignmentView(){
        $studnetId = Auth::user()->id;
        $semesterId =AssignStudent::where('student_id',$studnetId)->where('semester_id',2)->value('semester_id');
        $yearId =AssignStudent::where('student_id',$studnetId)->value('year_id');
        $batchId =AssignStudent::where('student_id',$studnetId)->value('batch_id');
        $classId =AssignStudent::where('student_id',$studnetId)->value('class_id');
        $shiftId =AssignStudent::where('student_id',$studnetId)->value('shift_id');
        $groupId =AssignStudent::where('student_id',$studnetId)->value('group_id');
        $monthId =AssignStudent::where('student_id',$studnetId)->value('month_id');
        $secondSemesterAssignments = StudentAssignment::where('semester_id',$semesterId)->where('year_id',$yearId)->where('batch_id',$batchId)->where('class_id',$classId)->where('shift_id',$shiftId)->where('group_id',$groupId)->where('month_id',$monthId)->get();
        // dd( $secondSemesterAssignments );
        return view('backend.student_panel.sd_myassignment.second_semester_assignment_view',compact('secondSemesterAssignments'));
    }
      // Second Semester data show metho end
    public function assignmentDetailsView($id){
        $details = StudentAssignment::find($id);
        return view('backend.student_panel.sd_myassignment.assignment_details_view',compact('details'));
    }
    public function assignmentPictureShow($id){
        $assignmentPicture = StudentAssignment::find($id);
        return view('backend.student_panel.sd_myassignment.assignment_picture_show',compact('assignmentPicture'));
    }
    public function assignmentDocumentShow($id){
        $assignmentDocument = StudentAssignment::find($id);
        return view('backend.student_panel.sd_myassignment.assignment_document_show',compact('assignmentDocument'));
    }
    public function assignmentPictureDownload($picture){
        $assignmentPicturePath = public_path('upload/student_assignment_image') .'/'. $picture;
        return response()->download( $assignmentPicturePath);
    }
    public function assignmentDocumentDownload($document){
        $assignmentDocumentPath = public_path('upload/student_assignment_file') .'/'. $document;
        return response()->download( $assignmentDocumentPath);
    }
    // end semester wise data show metho
}
