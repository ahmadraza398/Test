<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function ViewDesignation(){
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    } //End Method

    public function DesignationAdd(){
        return view('backend.setup.designation.add_designation');
    } //End  Method

    public function DesignationStore(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|unique:designations,name',
        ]);
        $data = new Designation();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Designation Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    } //End  Method

    public function DesignationEdit($id){
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('editData'));
    } //End  Method

    public function DesignationUpdate(Request $request,$id){
        
        $data = Designation::find($id);
        $validatedData = $request->validate([
            'name'=> 'required|unique:designations,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Designation Updated Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->route('designation.view')->with($notification);
    } //End  Method

    public function DesignationDelete($id){
        $user = Designation::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Designation Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('designation.view')->with($notification);
    } //End  Method
}
