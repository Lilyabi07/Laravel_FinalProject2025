@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

  @if($items->isEmpty())
    <p class="text-gray-600">Your cart is empty.</p>
  @else
    <table class="w-full mb-6 table-auto">
      <thead>
        <tr class="bg-gray-100">
          <th class="p-2 text-left">Product</th>
          <th class="p-2 text-center">Qty</th>
          <th class="p-2 text-right">Unit Price</th>
          <th class="p-2 text-right">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr>
          <td class="p-2">{{ $item['product']->name }}</td>
          <td class="p-2 text-center">{{ $item['quantity'] }}</td>
          <td class="p-2 text-right">${{ number_format($item['price'], 2) }}</td>
          <td class="p-2 text-right">${{ number_format($item['subtotal'], 2) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="text-right text-xl font-semibold mb-6">
      Total: ${{ number_format($total, 2) }}
    </div>

    <form method="POST" action="{{ route('checkout.store') }}" class="space-y-4 max-w-md">
      @csrf

      <div>
        <label class="block font-medium text-gray-700">Name</label>
        <input name="customer_name" type="text" value="{{ old('customer_name') }}"
               class="w-full mt-1 px-3 py-2 border rounded-md focus:ring" />
        @error('customer_name')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block font-medium text-gray-700">Email</label>
        <input name="customer_email" type="email" value="{{ old('customer_email') }}"
               class="w-full mt-1 px-3 py-2 border rounded-md focus:ring" />
        @error('customer_email')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block font-medium text-gray-700">Address</label>
        <textarea name="customer_address"
                  class="w-full mt-1 px-3 py-2 border rounded-md focus:ring">{{ old('customer_address') }}</textarea>
        @error('customer_address')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block font-medium text-gray-700">Payment Type</label>
        <select name="payment_type"
                class="w-full mt-1 px-3 py-2 border rounded-md focus:ring">
          <option value="">Choose…</option>
          <option value="card" {{ old('payment_type')=='card' ? 'selected':'' }}>Card</option>
          <option value="cash" {{ old('payment_type')=='cash' ? 'selected':'' }}>Cash</option>
        </select>
        @error('payment_type')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit"
              class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 transition">
        Place Order
      </button>
    </form>
  @endif
</div>
@endsection