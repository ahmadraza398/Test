<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYear(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year',$data);
    } //End ViewYear Method

    public function StudentYearAdd(){
        return view('backend.setup.year.add_year');
    } //End StudentYearAdd Method

    public function StudentYearStore(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|unique:student_years,name',
        ]);
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Year Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    } //End StudentClassStore Method

    public function StudentYearEdit($id){
        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year',compact('editData'));
    } //End StudentYearEdit Method

    public function StudentYearUpdate(Request $request,$id){
        
        $data = StudentYear::find($id);
        $validatedData = $request->validate([
            'name'=> 'required|unique:student_years,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Year Updated Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.year.view')->with($notification);
    } //End StudentClassUpdate Method

    public function StudentYearDelete($id){
        $user = StudentYear::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Year Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('student.year.view')->with($notification);
    } //End StudentClassDelete Method
}
