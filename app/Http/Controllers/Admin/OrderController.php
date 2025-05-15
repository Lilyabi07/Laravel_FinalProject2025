<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Require authentication and admin access.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a paginated list of orders, newest first.
     */
    public function index()
    {
        $orders = Order::with('items.product')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the details for a single order.
     *
     * @param  Order  $order  Route‑model bound Order instance
     */
    public function show(Order $order)
    {
        // Already eager‑loaded in index, but ensure here too:
        $order->load('items.product');

        return view('admin.orders.show', compact('order'));
    }
}