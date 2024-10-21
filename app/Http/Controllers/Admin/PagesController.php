<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        return view('Admin.dashboard');
    }
    
   
}
