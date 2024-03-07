<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function Viewgroup(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group',$data);
    } //End ViewGroup Method

    public function StudentGroupAdd(){
        return view('backend.setup.group.add_group');
    } //End StudentGroupAdd Method

    public function StudentGroupStore(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|unique:student_groups,name',
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Group Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    } //End StudentGroupStore Method

    public function StudentGroupEdit($id){
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group',compact('editData'));
    } //End StudentGroupEdit Method

    public function StudentGroupUpdate(Request $request,$id){
        
        $data = StudentGroup::find($id);
        $validatedData = $request->validate([
            'name'=> 'required|unique:student_groups,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Group Updated Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.group.view')->with($notification);
    } //End StudentGroupUpdate Method

    public function StudentGroupDelete($id){
        $user = StudentGroup::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Group Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('student.group.view')->with($notification);
    } //End StudentGroupDelete Method

}
