<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeCategoryAmount;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount(){
        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount',$data);
    } //End ViewFeeAmount Method

    public function AddFeeAmount(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount',$data);
    } //End AddFeeAmount Method

    public function StoreFeeAmount(Request $request){
        $countClass = count($request->class_id);
        if($countClass !=NULL ){
            for($i=0; $i <$countClass; $i++){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }//End For Loop

        } //End if condition
        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    } //End StoreFeeAmount Method

    public function EditFeeAmount($fee_category_id){
        $data['editData'] =  FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount',$data);
    } //End EditFeeAmount Method

    public function UpdateFeeAmount(Request $request,$fee_category_id){
        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'Oops..! You Have Not Select Any Class.',
                'alert-type' => 'error'
            );
            return redirect()->route('fee.amount.edit',$fee_category_id)->with($notification);
        }//End If Condition
        else {
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
                for($i=0; $i < $countClass; $i++){
                    $fee_amount = new FeeCategoryAmount();
                    $fee_amount->fee_category_id = $request->fee_category_id;
                    $fee_amount->class_id = $request->class_id[$i];
                    $fee_amount->amount = $request->amount[$i];
                    $fee_amount->save();
                }//End For Loop
        } //End Else
        $notification = array(
            'message' => 'Fee Amount Data Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    } //End Update FeeAmount Method

    public function DetailsFeeAmount($fee_category_id){
        $data['detailsData'] =  FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        return view('backend.setup.fee_amount.details_fee_amount',$data);

    } //End Details Fee Amount

    public function DeleteFeeAmount($fee_category_id){
        FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
        $notification = array(
            'message' => 'Fee Amount Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    //End FeeCatDelete Method
    }
}
