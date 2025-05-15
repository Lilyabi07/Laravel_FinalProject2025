<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Grab the raw cart (assoc array: [ productId => [ 'name'=>…, 'quantity'=>…, … ], … ])
        $cart = session('cart', []);

        // Turn it into a Collection of “enriched” line items
        $items = collect($cart)
            ->map(function($entry, $productId) {
                $prod = Product::findOrFail($productId);

                return [
                    'product_id' => $productId,
                    'product'    => $prod,
                    'name'       => $entry['name'],
                    'quantity'   => $entry['quantity'],
                    'price'      => $entry['price'],
                    'image'      => $entry['image'],
                    'subtotal'   => $entry['quantity'] * $entry['price'],
                ];
            })
            // re‑index to 0,1,2… so we can call ->values() or ->isEmpty() in the Blade
            ->values();

        // Grand total
        $total = $items->sum('subtotal');

        return view('cart.index', compact('items', 'total'));
    }

     public function add(Request $request, $productId)
    {
        // Fetch the product model or 404
        $product = Product::findOrFail($productId);

        // Grab existing cart (or an empty array)
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            // If it’s already in the cart, bump the quantity
            $cart[$productId]['quantity']++;
        } else {
            // Otherwise add a brand new line‐item array
            $cart[$productId] = [
                'product_id' => $productId,      // ← NEW: store the ID
                'name'       => $product->name,
                'quantity'   => 1,
                'price'      => $product->price,
                'image'      => $product->image,
            ];
        }

        // Save back into session
        session()->put('cart', $cart);

        return back()->with('success', "{$product->name} added to cart!");
    }

    public function update(Request $request)
    {
        // Expect an array of [ productId => [ 'quantity' => X ], … ]
        $newCart = [];
        foreach ($request->input('quantities', []) as $pid => $qty) {
            if ($qty > 0) {
                $newCart[$pid] = array_merge(
                    session("cart.{$pid}", []),
                    ['quantity' => (int)$qty]
                );
            }
        }
        session(['cart' => $newCart]);

        return back()->with('success', 'Cart updated');
    }

public function remove(Product $product)
{
    // Pull the cart array from session (productId => [ ... ])
    $cart = session()->get('cart', []);

    // Remove this product ID
    if (isset($cart[$product->id])) {
        unset($cart[$product->id]);
    }

    // If cart is now empty, forget the entire key; otherwise re‐write it
    if (empty($cart)) {
        session()->forget('cart');
    } else {
        session()->put('cart', $cart);
    }

    return redirect()
        ->route('cart.index')
        ->with('success', 'Product removed from cart');
}
}