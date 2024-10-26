<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Mail\OrderCompleted;
use App\Models\Order;
use App\Models\Product;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Mail;

class PosController extends Controller
{
    public function pos(Request $request)
    {

        $search = $request->input('search');
        $products = Product::latest()
            ->when($search, function ($query, $search) {
                return $query->product($search);
            })
            ->paginate(21);
        $cart = session()->get('cart', []);
        $paid_price = session()->get('paid_price', []);
        $grandTotal = collect($cart)->sum('subtotal');

        // dd($cart    );
        return view('agent.pos.create', compact('products', 'cart', 'grandTotal', 'paid_price'));
    }
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
            $cart[$product->id]['subtotal'] += $cart[$product->id]['price'] * $request->quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->product_name,
                "price" => $product->price,
                "quantity" => $request->quantity,
                "subtotal" => $product->price * $request->quantity
            ];
        }
        session()->put('cart', $cart);


        return redirect()->route('agent.pos')->with('success', 'Product added to cart successfully');
    }
    public function updateToCart(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
            $cart[$request->product_id]['subtotal'] = $cart[$request->product_id]['price'] * $request->quantity;

            session()->put('cart', $cart);
        }
        return redirect()->route('agent.pos')->with('success', 'Cart updated!');
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        // Remove product from cart if it exists
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('agent.pos')->with('success', 'Product removed from cart!');
    }
    public function addPaidPrice(Request $request)
    {

        $paid_price = session()->get('paid_price', []);

        $paid_price['paid_price'] = $request->paid_price;
        $paid_price['date'] = $request->dates;

        session()->put('paid_price', $paid_price);
        return redirect()->route('agent.user.info')->with('success', 'Complete the user info');

    }

    public function userInfo()
    {
        $customer = new User();

        if (request()->filled('phone')) {

            $customer = $customer->where('phone', request()->phone)->firstOrNew();
        }
        $cart = session()->get('cart', null);
        if ($cart == !null) {
            $grandTotal = collect($cart)->sum('subtotal');
            $add_points = $grandTotal / 100;
            $total_point = $customer->points + $add_points;
        } else {
            abort(404);
        }
        return view('agent.pos.user-info', compact('customer', 'add_points', 'total_point'));
    }
    public function orderCreate(Request $request)
    {


        $cart = session()->get('cart', []);
        $date_price = session()->get('paid_price', []);
        $total_price = collect($cart)->sum('subtotal');
        $paid_price = $date_price['paid_price'];
        $date = $date_price['date'];

        if ($total_price > $paid_price) {

            $due = $total_price - $paid_price;
        } else {
            $due = 0;
        }

        $user = User::where('phone', $request->phone)->first();
        $generatedPassword = null;
        if ($user) {
            $user->name = $request->name;
            $user->username = Str::slug($request->name);
            $user->points = $request->points;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->save();
        } else {
            $generatedPassword = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 8)), 0, 8);
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'username' => Str::slug($request->name),
                'email' => $request->email,
                'points' => $request->points,
                'address' => $request->address,
                'password' => Hash::make($generatedPassword), // Generate password
            ]);
        }

        $order = new Order();
        $order->user_id = $user->id;
        $order->author = auth()->user()->id;
        $order->unique_id = substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz', 12)), 0, 12);
        $order->total_price = $total_price;
        $order->paid_price = $paid_price;
        $order->due = $due;
        $order->date = $date;
        $order->save();

        foreach ($cart as $productId => $product) {
            $order->products()->attach($productId, [
                'quantity' => $product['quantity'],
                'total_price' => $product['subtotal'],
            ]);
        }

        // Send order confirmation email
        if ($user->email) {
            Mail::to($user->email)->send(new OrderCompleted($order, $generatedPassword));
        }
        session()->forget('cart');
        session()->forget('paid_price');
        return redirect(route('agent.pos'))->with('success', 'Order created successfully');
    }
}
