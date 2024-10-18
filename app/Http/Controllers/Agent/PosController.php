<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function pos()
    {
        return view('agent.pos.create');
    }
    public function addToCart(Request $request)
    {
        session()->put('cart', [
            'products' => $request['products'],
            'total_price' => $request['total_price'],
            'date' => $request['dates'],
        ]);
        $cart = session('cart');
        return redirect()->route('agent.user.info');
    }
    public function userInfo()
    {
        $customer = new User();

        if (request()->filled('phone')) {

            $customer = $customer->where('phone', request()->phone)->firstOrNew();
        }
        $cart = session()->get('cart', null);
        if ($cart == !null) {
            $total_price = $cart['total_price'];
            $add_points = $total_price / 100;
            $total_point = $customer->points + $add_points;            
        }else {
            abort(404);
        }
        return view('agent.pos.user-info', compact('customer','add_points','total_point'));
    }
    public function orderCreate(Request $request)
    {

    }
}
