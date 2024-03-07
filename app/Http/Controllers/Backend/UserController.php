<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MOdels\User;

class UserController extends Controller
{
    public function UserView(){
        $data['allData'] = User::where('usertype','Admin')->get();
        return view('backend.user.view_user', $data);
    } //End UserView Method 

    public function UserAdd(){
        return view('backend.user.add_user');
    } //End UserAdd Method

    public function UserStore(Request $request){
        $validatedData = $request->validate([
            'email'=> 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        $code = rand(0000,9999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        //if wants to save password as random number in database so nobody can see that
        $data->password = bcrypt($code);
        //if wants to save the password in DB exactly what you have written
        // $data->password = $request->password;
        $data->code = $code;
        $data->save();

        $notification = array(
            'message' => 'User Added Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);
    } //End UserStore Method

    public function UserEdit($id){
        $editData = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    } //End UserEdit Method

    public function UserUpdate(Request $request, $id){

        $data = User::find($id);
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User Data Updated Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);
    } //End UserUpdate Method

    public function UserDelete($id){
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('user.view')->with($notification);   
    } //End UserDelete Method
}
