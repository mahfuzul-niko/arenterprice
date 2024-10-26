<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function allCustomer(){
        $users = User::filter()->latest()->paginate(10);
        return view('customer.list',compact('users'));
    }
    public function singleCustomer($id){
        $user = User::where('id' , $id)->first();
        $orders = Order::where('user_id',$id)->filter()->with('products')->latest()->paginate(10);
        return view('customer.single',compact('user','orders'));
    }
    public function changeRole(User $user,Request $request){
        $user->role = $request->role;
        $user->save();
        return redirect()->back()->with('success','Customer Role Updated Success');
    }
}
