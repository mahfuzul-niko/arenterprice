<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileContorller extends Controller
{
    public function profile(){
        return view('profile.profile');
    }
    public function profileUpdate(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            
        ]);
        $user = User::find(auth()->user()->id);
        
        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('uploads', 'public');
        }
        $user->name = $request->name;
        
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();
        return redirect(route('edit.profile'))->with('success','Profile Udated');
    }
    public function passwordUpdate(Request $request)
    {


        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed',
        ]);


        if (Hash::check($request->current_password, Auth::user()->password)) {

            $user = User::find(auth()->id());
            $user->password = Hash::make($request->password);
            $user->save();


            return back()->with('success', 'Password updated successfully');
        } else {
            return back()->withErrors('Success');
        }
    }
}
