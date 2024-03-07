<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewShift(){
        $data['allData'] = Studentshift::all();
        return view('backend.setup.shift.view_shift',$data);
    } //End Viewshift Method

    public function StudentshiftAdd(){
        return view('backend.setup.shift.add_shift');
    } //End StudentshiftAdd Method

    public function StudentshiftStore(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|unique:student_shifts,name',
        ]);
        $data = new Studentshift();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Shift Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    } //End StudentshiftStore Method

    public function StudentshiftEdit($id){
        $editData = Studentshift::find($id);
        return view('backend.setup.shift.edit_shift',compact('editData'));
    } //End StudentshiftEdit Method

    public function StudentshiftUpdate(Request $request,$id){
        
        $data = Studentshift::find($id);
        $validatedData = $request->validate([
            'name'=> 'required|unique:student_shifts,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Shift Updated Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.shift.view')->with($notification);
    } //End StudentshiftUpdate Method

    public function StudentshiftDelete($id){
        $user = Studentshift::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Shift Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('student.shift.view')->with($notification);
    } //End StudentshiftDelete Method
}
