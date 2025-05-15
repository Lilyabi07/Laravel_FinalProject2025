<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page with cart contents.
     */
    public function checkout()
    {
        $cart = session('cart', []);

        $items = collect($cart)
            ->map(function($entry, $productId) {
                if (! isset($entry['quantity'], $entry['price'])) {
                    return null;
                }

                $product = Product::find($productId);
                if (! $product) {
                    return null;
                }

                return [
                    'product'    => $product,
                    'product_id' => $product->id,
                    'quantity'   => $entry['quantity'],
                    'price'      => $entry['price'],
                    'subtotal'   => $entry['price'] * $entry['quantity'],
                ];
            })
            ->filter()
            ->values();

        $total = $items->sum('subtotal');

        return view('checkout.index', compact('items', 'total'));
    }

    /**
     * Handle the "place order" form submission.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name'    => 'required|string',
            'customer_email'   => 'required|email',
            'customer_address' => 'required|string',
            'payment_type'     => 'required|in:card,cash',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        // 1) Create the order record
        $order = Order::create([
            'user_id'          => auth()->id(),
            'customer_name'    => $data['customer_name'],
            'customer_email'   => $data['customer_email'],
            'customer_address' => $data['customer_address'],
            'payment_type'     => $data['payment_type'],
            'total_amount'     => collect($cart)
                                    ->sum(fn($i) => $i['price'] * $i['quantity']),
        ]);

        // 2) Insert each order_item
        foreach ($cart as $productId => $entry) {
            $product = Product::find($productId);
            if (! $product) {
                continue;
            }

            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $product->id,
                'quantity'   => $entry['quantity'],
                'price'      => $entry['price'],
            ]);
        }

        // Note: not clearing the cart here so users return to products with items intact
        return redirect()
            ->route('products.index')
            ->with('success', 'Order placed successfully!');
    }
}
