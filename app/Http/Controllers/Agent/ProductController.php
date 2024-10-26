<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $search = $request->input('search');
        $products = Product::latest()
            ->when($search, function ($query, $search) {
                return $query->product($search);
            })
            ->paginate(21);
        return view('agent.product.list', compact('products'));
    }
    public function productCreate()
    {
        $units = Unit::latest()->get();
        return view('agent.product.create', compact('units'));
    }
    public function productStore(Request $request)
    {

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->slug = str::slug($request->product_name);
        $product->brand_name = $request->brand_name;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $product->image = $request->file('image')->store('uploads', 'public');
        }
        $product->save();
        return redirect(route('agent.product'))->with('success', 'Product added successfully');
    }
    public function productEdit($slug)
    {
        $product = Product::where('slug', $slug)->first();
        ;
        $units = Unit::latest()->get();
        return view('agent.product.edit', compact('units', 'product'));
    }
    public function productUpdate(Product $product, Request $request)
    {

        $product->product_name = $request->product_name;
        $product->slug = str::slug($request->product_name);
        $product->brand_name = $request->brand_name;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $product->image = $request->file('image')->store('uploads', 'public');
        }
        $product->save();
        return redirect(route('agent.product'))->with('success', 'Product Updated successfully');
    }
    public function destroy(Product $product)
    {
        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route('agent.product')->with('success', 'Product deleted successfully');
    }
}
