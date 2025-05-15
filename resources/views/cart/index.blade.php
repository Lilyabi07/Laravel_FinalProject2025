
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

  @if($items->isEmpty())
    <p class="text-gray-600">Your cart is empty.</p>
  @else
    {{-- Bulk‐update quantities --}}
    <form action="{{ route('cart.update') }}" method="POST" class="mb-6">
      @csrf

      <table class="w-full mb-4 table-auto">
        <thead>
          <tr class="bg-gray-100">
            <th class="p-2 text-left">Product</th>
            <th class="p-2 text-center">Qty</th>
            <th class="p-2 text-right">Price</th>
            <th class="p-2 text-right">Subtotal</th>
            <th class="p-2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td class="p-2">{{ $item['product']->name }}</td>
              <td class="p-2 text-center">
                <input
                  type="number"
                  name="cart[{{ $item['product_id'] }}][quantity]"
                  value="{{ $item['quantity'] }}"
                  min="1"
                  class="w-16 border rounded px-2 py-1 text-center"
                />
              </td>
              <td class="p-2 text-right">${{ number_format($item['price'], 2) }}</td>
              <td class="p-2 text-right">${{ number_format($item['subtotal'], 2) }}</td>
              <td class="p-2 text-center">
                {{-- Only the remove button uses DELETE --}}
                <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:underline">
                    Remove
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="text-right text-xl font-semibold mb-4">
        Total: ${{ number_format($items->sum('subtotal'), 2) }}
      </div>

      <div class="flex justify-between">
        <button
          type="submit"
          class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
          Update Quantities
        </button>

        <a
          href="{{ route('checkout') }}"
          class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700"
        >
          Proceed to Checkout
        </a>
      </div>
    </form>
  @endif
</div>
@endsection