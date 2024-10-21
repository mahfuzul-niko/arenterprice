<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PosController extends Controller
{
    public function pos()
    {
        $units = Unit::all();
        return view('agent.pos.create', compact('units'));
    }
    public function addToCart(Request $request)
    {

        session()->put('cart', [
            'products' => $request['products'],
            'total_price' => $request['total_price'],
            'paid_price' => $request['paid_price'],
            'date' => $request['dates'],
        ]);
        $cart = session('cart');

        return redirect()->route('agent.user.info')->with('warning', 'Complite Customer Information');
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
        } else {
            abort(404);
        }
        return view('agent.pos.user-info', compact('customer', 'add_points', 'total_point'));
    }
    public function orderCreate(Request $request)
    {
        $cart = session()->get('cart', []);
        $total_price = $cart['total_price'];
        $paid_price = $cart['paid_price'];
        $date = $cart['date'];
        if ($total_price > $paid_price) {

            $due = $total_price - $paid_price;
        } else {
            $due = 0;
        }



        $user = User::updateOrCreate(
            ['phone' => $request->phone],
            [
                'name' => $request->name,
                'username' => Str::slug($request->name),
                'points' => $request->points,
                'email' => $request->email,
                'address' => $request->address,
                'password' => Hash::make(substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz', 8)), 0, 8)),
            ]
        );



        $order = new Order();
        $order->user_id = $user->id;
        $order->unique_id = substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz', 12)), 0, 12);
        $order->total_price = $total_price;
        $order->paid_price = $paid_price;
        $order->due = $due;
        $order->date = $date;
        $order->save();

        foreach ($cart['products'] as $product) {
            Product::create([
                'order_id' => $order->id,
                'product_name' => $product['product_name'],
                'brand_name' => $product['brand_name'],
                'price' => $product['price'],
                'unit' => $product['unit'],
                'quantity' => $product['quantity'],
                'description' => $product['description'],
            ]);
        }
        session()->forget('cart');

        return redirect(route('agent.pos'))->with('success', 'Order created successfully');
    }
}
