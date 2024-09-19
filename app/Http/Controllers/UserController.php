<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class UserController extends Controller
{
    function profile_edit(){
        return view('admin.user.edit');
    }
    function profile_update(Request $request){
        User::find(Auth::id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    function password_update(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => ['required','confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'password_confirmation' => 'required',


        ]);
        if(Hash::check($request->current_password, Auth::user()->password)){
           User::find(Auth::id())->update([
            'password'=>bcrypt($request->password),
           ]);
           return redirect()->back()->with('update',);
        }
        else{
            return redirect()->back()->with('error_current_pass', 'currrent password not match!');
        }
    }

    function photo_update(Request $request){
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photo = $request->file('photo');
        $extension = $photo->getClientOriginalExtension();
        $file_name = uniqid() . '.' . $extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($photo);
        $image->resize(150, 150);
        $image->save(public_path('uploads/user/'. $file_name));
        User::find(Auth::id())->update([
            'photo' => $file_name,
        ]);
        return redirect()->back()->with('photo_update', 'Photo updated successfully!');
    }

    function user(){
        $users = User::all();
        return view('admin.user.user',compact('users'));
    }
    function user_delete($user_id){
        User::find($user_id)->delete();
        return redirect()->back()->with('delete', 'User delete successfully!');
    }

    function user_add (Request $request){
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>carbon::now(),
        ]);
        return redirect()->back()->with('success', 'User Add successfully!');
    }




}
