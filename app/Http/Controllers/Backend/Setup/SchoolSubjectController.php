<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;


class SchoolSubjectController extends Controller
{
    public function ViewSubject(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject',$data);
    } //End ViewFeeCat Method

    public function SubjectAdd(){
        return view('backend.setup.school_subject.add_school_subject');
    } //End  Method

    public function SubjectStore(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|unique:school_subjects,name',
        ]);
        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Subject Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    } //End  Method

    public function SubjectEdit($id){
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject',compact('editData'));
    } //End  Method

    public function SubjectUpdate(Request $request,$id){
        
        $data = SchoolSubject::find($id);
        $validatedData = $request->validate([
            'name'=> 'required|unique:school_subjects,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Subject Updated Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->route('school.subject.view')->with($notification);
    } //End  Method

    public function SubjectDelete($id){
        $user = SchoolSubject::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Subject Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('school.subject.view')->with($notification);
    } //End  Method
}
