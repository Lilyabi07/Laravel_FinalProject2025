@extends('layouts.app')
@include('partials.flash')

@section('content')
<div class="min-h-screen bg-[#001220] flex flex-col items-center pt-16 pb-16 relative overflow-hidden">
    {{-- SVG fills the background --}}
    <img 
        src="{{ asset('images/PolygonLuminary.svg') }}" 
        alt="Polygon Mesh Decorative SVG" 
        class="absolute left-0 top-0 w-full h-full"
        style="object-fit: cover; z-index: 0; pointer-events: none; user-select: none;"
    />

    <h1 class="text-3xl font-bold text-white mb-10 text-center z-10">Products</h1>
    @if($products->isEmpty())
        <div class="flex justify-center items-center h-96 z-10">
            <p class="text-xl text-gray-400">No products yet.</p>
        </div>
    @else
        <div class="grid gap-10 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full max-w-7xl px-4 z-10">
            @foreach ($products as $product)
            <div class="bg-white/20 backdrop-blur-md border border-white/10 rounded-2xl shadow-lg 
                        flex flex-col items-center text-center px-8 py-10 transition hover:scale-105 hover:shadow-2xl duration-200">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-32 h-32 object-contain mb-5 rounded-xl bg-white/10 shadow" />
                @else
                    <div class="w-32 h-32 bg-white/10 flex items-center justify-center mb-5 rounded-xl text-gray-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 17v2a2 2 0 002 2h14a2 2 0 002-2v-2m-5-10V5a2 2 0 00-2-2h-2a2 2 0 00-2 2v2m-6 5h20" />
                        </svg>
                    </div>
                @endif

                <h2 class="text-lg font-semibold text-white mb-1">{{ $product->name }}</h2>
                <p class="text-gray-200 mb-3 truncate w-full">{{ $product->description }}</p>
                <div class="text-yellow-300 font-bold text-xl mb-6">${{ number_format($product->price, 2) }}</div>
                <div class="flex gap-2 justify-center w-full">
                    <a href="{{ route('products.show', $product->id) }}" class="px-4 py-2 rounded-xl bg-yellow-300 text-[#001220] font-semibold hover:bg-yellow-200 transition text-sm shadow">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="px-4 py-2 rounded-xl bg-white/30 text-white font-semibold hover:bg-white/40 transition text-sm shadow">Edit</a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
