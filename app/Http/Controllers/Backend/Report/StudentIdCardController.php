<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use PDF;

class StudentIdCardController extends Controller
{
    public function IdCardView(){
      $data['years'] = StudentYear::all();
      $data['classes'] = StudentClass::all();
      return view('backend.report.idcard.idcard_view',$data);
    } //End Method

    public function IdCardGet(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $check_data = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->first();

        if ($check_data == true) {

            $data['allData'] = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
            // dd($data['allData']->toArray());

            // $pdf = PDF::loadView('backend.report.idcard.idcard_pdf', $data);
            // $pdf->SetProtection(['copy', 'print'], '', 'pass');
            // return $pdf->stream('document.pdf');
            return view('backend.report.idcard.idcard_pdf', $data);

        }else {
            
            $notification = array(
                'message' => 'No matching data available',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }//End Method
}
