<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
class StudentClassController extends Controller
{
    public function ViewStudent(){
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    } //End ViewStudent Method

    public function StudentClassAdd(){
        return view('backend.setup.student_class.add_class');
    } //End StudentAdd Method

    public function StudentClassStore(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|unique:student_classes,name',
        ]);
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Class Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    } //End StudentClassStore Method

    public function StudentClassEdit($id){
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('editData'));
    } //End StudentClassEdit Method

    public function StudentClassUpdate(Request $request,$id){
        
        $data = StudentClass::find($id);
        $validatedData = $request->validate([
            'name'=> 'required|unique:student_classes,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Class Updated Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.class.view')->with($notification);
    } //End StudentClassUpdate Method

    public function StudentClassDelete($id){
        $user = StudentClass::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Class Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('student.class.view')->with($notification);
    } //End StudentClassDelete Method
}
