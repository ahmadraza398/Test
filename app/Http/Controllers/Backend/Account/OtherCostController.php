<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountOtherCost;
use Illuminate\Http\Request;

class OtherCostController extends Controller
{
    public function OtherCostView(){
        $data['allData'] = AccountOtherCost::orderBy('id','desc')->get();
        return view('backend.account.other_cost.other_cost_view',$data);
    } //End Method

    public function OtherCostAdd(){
        return view('backend.account.other_cost.other_cost_add');
    } //End Method

    public function OtherCostStore(Request $request){
        $cost = new AccountOtherCost();
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount;

        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'),$filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description;
        $cost->save();

        $notification = array(
            'message' => 'Other Cost Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('other.cost.view')->with($notification); 
    
    } //End Method

    public function OtherCostEdit($id){
        $data['editData'] = AccountOtherCost::find($id);
        return view('backend.account.other_cost.other_cost_edit',$data);
    } //End Method

    public function OtherCostUpdate(Request $request, $id){
        $cost = AccountOtherCost::find($id);
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount;

        if($request->file('image')){
            $file= $request->file('image');
            @unlink(public_path('upload/cost_images/'.$cost->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'),$filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description;
        $cost->save();

        $notification = array(
            'message' => 'Other Cost Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('other.cost.view')->with($notification); 
    
    } //End Method
}
