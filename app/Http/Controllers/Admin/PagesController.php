<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        $orders = Order::latest()->get();

        $authorOrder = Order::filter()->where('author', auth()->user()->id)->latest()->paginate(10);
        $authorOrderTotalPrice = Order::where('author', auth()->user()->id)->sum('total_price');


        $ordersCount = $orders->count();
        $monthlyOrderCounts = array_fill(0, 12, 0);
        // Get the order counts grouped by month
        $ordersByMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');
        foreach ($ordersByMonth as $month => $count) {
            $monthlyOrderCounts[$month - 1] = $count;
        }

        $totalEarning = Order::sum('total_price');
        $totalDue = Order::sum('due');
        $totalDueCurrentMonth = Order::whereMonth('created_at', now()->month)->sum('due');
        $totalEarningCurrentMonth = Order::whereMonth('created_at', now()->month)->sum('total_price');

        return view('Admin.dashboard', compact('ordersCount', 'monthlyOrderCounts', 'totalEarning', 'totalDue', 'totalDueCurrentMonth', 'totalEarningCurrentMonth', 'authorOrderTotalPrice','authorOrder'));
    }


}
