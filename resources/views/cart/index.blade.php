@extends('layouts.app')
@include('partials.flash')

@section('content')
<div class="min-h-screen bg-[#001220] flex flex-col items-center pt-16 pb-16 relative overflow-hidden">
    {{-- Full-page decorative SVG background --}}
    <img 
        src="{{ asset('images/PolygonLuminary.svg') }}" 
        alt="Polygon Mesh Decorative SVG" 
        class="absolute inset-0 w-full h-full object-cover pointer-events-none select-none"
        style="z-index: 0;"
    />

    <div class="relative z-10 bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl p-10 border border-white/20 w-full max-w-3xl">
        <h1 class="text-3xl font-bold text-white mb-8">Your Cart</h1>

        @if($items->isEmpty())
            <p class="text-gray-300">Your cart is empty.</p>
        @else
            <table class="w-full mb-6 text-white">
                <thead>
                    <tr class="text-yellow-300 border-b border-white/20">
                        <th class="p-2 text-left">Product</th>
                        <th class="p-2 text-center">Qty</th>
                        <th class="p-2 text-right">Price</th>
                        <th class="p-2 text-right">Subtotal</th>
                        <th class="p-2 text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr class="border-b border-white/10">
                        {{-- Product name --}}
                        <td class="p-2">{{ $item['product']->name }}</td>

                        {{-- Update quantity form --}}
                        <td class="p-2 text-center">
                            <form action="{{ route('cart.update') }}" method="POST" class="inline-flex items-center">
                                @csrf
                                <input 
                                    type="number" 
                                    name="quantities[{{ $item['product_id'] }}]" 
                                    value="{{ $item['quantity'] }}" 
                                    min="1" 
                                    class="w-16 rounded bg-white/20 text-white px-2 py-1 text-center"
                                >
                                <button 
                                    type="submit" 
                                    class="ml-2 px-2 py-1 bg-yellow-300 text-[#001220] rounded text-xs font-semibold hover:bg-yellow-200 transition"
                                >
                                    Update
                                </button>
                            </form>
                        </td>

                        {{-- Price --}}
                        <td class="p-2 text-right">${{ number_format($item['price'], 2) }}</td>

                        {{-- Subtotal --}}
                        <td class="p-2 text-right">${{ number_format($item['subtotal'], 2) }}</td>

                        {{-- Remove form --}}
                        <td class="p-2 text-right">
                            <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="px-2 py-1 bg-red-400/70 hover:bg-red-500 text-white rounded text-xs font-semibold transition"
                                >
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Total & Proceed --}}
            <div class="flex justify-between items-center">
                <span class="text-xl text-yellow-300 font-bold">
                    Total: ${{ number_format($total, 2) }}
                </span>
                <a 
                    href="{{ route('checkout.index') }}" 
                    class="px-6 py-2 rounded-xl bg-blue-400 text-white font-semibold hover:bg-blue-500 transition shadow"
                >
                    Proceed to Checkout
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
