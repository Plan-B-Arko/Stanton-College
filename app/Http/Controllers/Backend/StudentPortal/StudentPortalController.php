<?php

namespace App\Http\Controllers\Backend\StudentPortal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use Illuminate\Support\Facades\Auth;

class StudentPortalController extends Controller
{
    public function mySubjectView(){
        $studnetId = Auth::user()->id;
        $data['allData'] = AssignStudent::with('assignedSubjects.subject')->where('student_id',$studnetId)->get();
        // dd($data['allData']->toArray());
        return view('backend.student_panel.sd_mysubject.mysubject_view', $data);
    }
}
