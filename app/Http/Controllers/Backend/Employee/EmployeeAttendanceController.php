<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;

class EmployeeAttendanceController extends Controller
{
    public function AttendanceView(){
        // $data['allData'] = EmployeeAttendance::orderBy('id','desc')->get();
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('date','desc')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view',$data);
    }//End Method

    public function AttendanceAdd(){
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_add',$data);
    } //End Method

    public function AttendanceStore(Request $request){

        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $countemployee = count($request->employee_id);
        for ($i=0; $i < $countemployee ; $i++) {
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        } //End For Loop
        $notification = array(
            'message' => 'Attendance Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('employee.attendance.view')->with($notification); 
    
    } //End Method

    public function AttendanceEdit($date){
        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_edit',$data);
    }//End Method

    public function AttendanceDetails($date){
        $data['details'] = EmployeeAttendance::where('date',$date)->get();
        return view('backend.employee.employee_attendance.employee_attendance_details',$data);
    }
}
