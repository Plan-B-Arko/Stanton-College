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
}
