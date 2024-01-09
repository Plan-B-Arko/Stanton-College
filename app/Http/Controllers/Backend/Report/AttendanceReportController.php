<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;
use Barryvdh\DomPDF\Facade\Pdf;
class AttendanceReportController extends Controller
{
    public function AttendanceReportView(){
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.report.attendance_report.attendance_report_view',$data);
    }

    public function AttendanceReportGet(Request $request){
        $employee_id = $request->employee_id;
    	if ($employee_id != '') {
    		$where[] = ['employee_id',$employee_id];
    	}
    	$date = date('Y-m', strtotime($request->date));
    	if ($date != '') {
    		$where[] = ['date','like',$date.'%'];
    	}

    $singleAttendance = EmployeeAttendance::with(['user'])->where($where)->get();

    if ($singleAttendance == true) {
    	$data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();
    	// dd($data['allData']->toArray());

    	$data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();

    	$data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();

    	$data['month'] = date('m-Y', strtotime($request->date));

    $pdf = Pdf::loadView('backend.report.attendance_report.attendance_report_pdf', $data);
	return $pdf->stream('document.pdf');

    }else{
    	
    	$notification = array(
    		'message' => 'Sorry These Criteria Donse not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
    }


    } // end Method 
}
