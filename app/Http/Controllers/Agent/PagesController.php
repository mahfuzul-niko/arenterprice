<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        $authorOrder = Order::filter()->where('author', auth()->user()->id)->latest()->paginate(10);
        $authorOrderTotalPrice = Order::where('author', auth()->user()->id)->sum('total_price');
        return view('agent.dashboard',compact('authorOrderTotalPrice', 'authorOrder'));
    }
}
