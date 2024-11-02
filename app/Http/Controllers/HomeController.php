<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userOrder = Order::filter()->where('user_id', auth()->user()->id)->latest()->paginate(10);
        $userOrderTotalPrice = Order::where('user_id', auth()->user()->id)->sum('total_price');
        $userOrderDuePrice = Order::where('user_id', auth()->user()->id)->sum('due');
        // dd();
        return view('home', compact('userOrder', 'userOrderTotalPrice', 'userOrderDuePrice'));
    }
   
    public function singleOrder($unique_id)
    {
        $order = Order::where('unique_id', $unique_id)->firstOrFail();

        return view('user.order-view', compact('order'));
    }
}
