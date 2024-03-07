<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarksGrade;

class GradeController extends Controller
{
    public function MarksGradeView(){
        $data['allData'] = MarksGrade::all();
        return view('backend.marks.grade_marks_view',$data);
    }//End Method

    public function MarksGradeAdd(){
        return view('backend.marks.grade_marks_add');
    } //End Method

    public function MarksGradeStore(Request $request){
        $data = new MarksGrade();
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();

        $notification = array(
            'message' => 'Grade Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('marks.entry.grade')->with($notification);
    }//End Method

    public function MarksGradeEdit($id){
        $data['editData'] = MarksGrade::find($id);
        return view('backend.marks.grade_marks_edit',$data);

    } //End Method

    public function MarksGradeUpdate(Request $request,$id){
        $data = MarksGrade::find($id);
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();

        $notification = array(
            'message' => 'Grade Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('marks.entry.grade')->with($notification);
    }
}
