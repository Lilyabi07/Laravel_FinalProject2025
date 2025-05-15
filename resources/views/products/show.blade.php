@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-10">
            {{-- Left: Product Image --}}
            <div class="w-full md:w-1/2 flex flex-col items-center">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-80 h-80 object-contain rounded-xl shadow mb-6 bg-white">
                @else
                    <div class="w-80 h-80 flex items-center justify-center rounded-xl bg-gray-100 text-gray-300 mb-6">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 17v2a2 2 0 002 2h14a2 2 0 002-2v-2m-5-10V5a2 2 0 00-2-2h-2a2 2 0 00-2 2v2m-6 5h20" />
                        </svg>
                    </div>
                @endif
            </div>

            {{-- Right: Product Details --}}
            <div class="w-full md:w-1/2 flex flex-col gap-6">
                <div>
                    <span class="text-sm text-gray-500">{{ $product->category }}</span>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
                    <div class="text-2xl font-semibold text-indigo-600 mb-2">${{ number_format($product->price, 2) }}</div>
                    <div class="mb-4">
                        <span class="font-medium text-gray-700">In stock:</span>
                        <span class="text-gray-900">{{ $product->stock_quantity }}</span>
                    </div>
                    <div class="mb-4 text-gray-700">{{ $product->description }}</div>
                </div>
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-4">
                    @csrf
                    <button type="submit" class="w-full py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-900 transition text-lg">
                        Add to cart
                    </button>
                </form>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="font-semibold text-gray-900 mb-1">Standard Shipping:</p>
                    <p class="text-gray-700">Wed Jan 11 - Fri Jan 13 <span class="text-green-600 font-semibold">for free</span></p>
                    <p class="text-xs text-gray-500 mt-2">100-day right of return</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection