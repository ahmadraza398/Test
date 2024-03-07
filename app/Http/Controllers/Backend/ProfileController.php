<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.view_profile', compact('user'));
    } //End ProfileView Method

    public function ProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.user.edit_profile', compact('editData'));
    } //End ProfileEdit Method

    public function ProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if($request->file('image')){
            $file= $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Profile Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('profile.view')->with($notification); 
    } //End ProfileStore Method

    public function PasswordView(){
        return view('backend.user.edit_password');
    } //End PasswordVIew Method

    public function PasswordUpdate(Request $request){
        $validatedData = $request->validate([
            'oldpassword'=> 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Changed',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        }else{
            return redirect()->back();
        }
    } //End PasswordUpdate Method
}
