<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        return view('agent.product.list');
    }
    public function productCreate(){
        $units = Unit::latest()->get();
        return view('agent.product.create',compact('units'));
    }
    public function productStore(Request $request){
        dd($request->all());
    }
}
