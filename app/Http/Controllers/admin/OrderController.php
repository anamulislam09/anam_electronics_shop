<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index()
    {
        $orders = Order::where('status', 'pending')->latest()->paginate(5);
        return view('admin.pendingorders', compact('orders'));
    }
}
