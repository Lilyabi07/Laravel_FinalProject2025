@extends('layouts.app')
@include('partials.flash')

@section('content')
<div class="min-h-screen bg-[#001220] flex items-center justify-center py-16 relative overflow-hidden">
    {{-- Decorative SVG background --}}
    <img 
        src="{{ asset('images/PolygonLuminary.svg') }}" 
        alt="Polygon Mesh Decorative SVG" 
        class="absolute left-0 top-0 w-full h-full"
        style="object-fit: cover; z-index: 0; pointer-events: none; user-select: none;"
    />

    <div class="relative z-10 bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl flex flex-col md:flex-row items-center gap-12 p-10 border border-white/20 max-w-4xl w-full">
        {{-- Product Image --}}
        <div class="flex-shrink-0">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                     class="w-80 h-80 object-contain rounded-2xl bg-white/20 shadow-lg" />
            @else
                <div class="w-80 h-80 flex items-center justify-center rounded-2xl bg-white/10 text-gray-300">
                    <svg class="w-20 h-20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 17v2a2 2 0 002 2h14a2 2 0 002-2v-2m-5-10V5a2 2 0 00-2-2h-2a2 2 0 00-2 2v2m-6 5h20" />
                    </svg>
                </div>
            @endif
        </div>

        {{-- Product Info --}}
        <div class="flex-1 flex flex-col gap-4">
            <span class="uppercase text-xs tracking-widest text-blue-200">{{ $product->category }}</span>
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow">{{ $product->name }}</h1>
            <div class="text-yellow-300 font-bold text-2xl mb-2">${{ number_format($product->price, 2) }}</div>
            <div class="text-sm text-green-300 mb-2">In stock: {{ $product->stock_quantity }}</div>
            <p class="text-white/80 mb-4">{{ $product->description }}</p>
            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="flex gap-4 items-center">
                @csrf
                <button type="submit" class="px-6 py-3 rounded-xl bg-yellow-300 text-[#001220] font-semibold hover:bg-yellow-200 transition shadow">
                    Add to cart
                </button>
            </form>
            <div class="mt-6 text-xs text-white/60">
                <div>Standard Shipping: <span class="text-green-300">Free</span></div>
                <div>100-day right of return</div>
            </div>
        </div>
    </div>
</div>
@endsection