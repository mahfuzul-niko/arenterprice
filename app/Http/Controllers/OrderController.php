<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Order(Request $request)
    {
        $orders = Order::filter()->with('products')->paginate(20);

        return view('order.list', compact('orders'));
    }

    public function singleOrder($unique_id)
    {
        $order = Order::where('unique_id', $unique_id)->with('products', 'histories')->firstOrFail();
        return view('order.single', compact('order'));
    }
    public function makePamente(Order $order, Request $request)
    {

        $order->paid_price = $order->paid_price + $request->amount;
        $order->due = $order->due - $request->amount;
        $order->save();
        $history = new History;
        $history->order_id = $order->id;
        $history->user_id = $order->user->id;
        $history->author = auth()->user()->id;
        $history->date = $request->date;
        $history->amount = $request->amount;
        $history->save();
        return redirect()->back()->with('success', 'Due amounts updated successfully');

    }
    
}
