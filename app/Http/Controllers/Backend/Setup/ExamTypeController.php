<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ViewExamType(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',$data);
    } //End ViewFeeCat Method

    public function ExamTypeAdd(){
        return view('backend.setup.exam_type.add_exam_type');
    } //End FeeCatAdd Method

    public function ExamTypeStore(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|unique:exam_types,name',
        ]);
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Exam Type Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    } //End FeeCatStore Method

    public function ExamTypeEdit($id){
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type',compact('editData'));
    } //End FeeCatEdit Method

    public function ExamTypeUpdate(Request $request,$id){
        
        $data = ExamType::find($id);
        $validatedData = $request->validate([
            'name'=> 'required|unique:exam_types,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Exam Type Updated Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->route('exam.type.view')->with($notification);
    } //End FeeCatUpdate Method

    public function ExamTypeDelete($id){
        $user = ExamType::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Exam Type Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('exam.type.view')->with($notification);
    } //End FeeCatDelete Method
}
