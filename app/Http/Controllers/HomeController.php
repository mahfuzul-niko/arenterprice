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
        return view('home', );
    }
    public function orderList()
    {
        $orders = Order::where('user_id', auth()->user()->id)->user_filter()->with('products')->paginate(20);
        return view('user.order-list', compact('orders'));
    }
    public function singleOrder($unique_id)
    {
        $order = Order::where('unique_id', $unique_id)->firstOrFail();

        return view('user.order-view', compact('order'));
    }
}
