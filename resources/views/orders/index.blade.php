@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 pb-10">
    <div class="container mx-auto px-4 pt-12">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Products</h1>
            <a href="{{ route('products.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold shadow hover:bg-indigo-700 transition">+ Add New</a>
        </div>

        @if($products->isEmpty())
            <div class="flex flex-col items-center justify-center mt-32">
                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 17v2a2 2 0 002 2h14a2 2 0 002-2v-2m-5-10V5a2 2 0 00-2-2h-2a2 2 0 00-2 2v2m-6 5h20" />
                </svg>
                <p class="text-lg text-gray-500">No products yet.</p>
            </div>
        @else
            <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($products as $product)
                    <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center text-center hover:shadow-lg transition">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-contain mb-3 rounded-md bg-gray-50">
                        @else
                            <div class="w-32 h-32 bg-gray-100 flex items-center justify-center mb-3 rounded-md text-gray-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 17v2a2 2 0 002 2h14a2 2 0 002-2v-2m-5-10V5a2 2 0 00-2-2h-2a2 2 0 00-2 2v2m-6 5h20" />
                                </svg>
                            </div>
                        @endif
                        <h2 class="text-lg font-semibold text-gray-800 mb-1">{{ $product->name }}</h2>
                        <p class="text-gray-500 mb-2 truncate w-full">{{ $product->description }}</p>
                        <div class="text-indigo-600 font-bold text-xl mb-4">${{ number_format($product->price, 2) }}</div>
                        <div class="flex gap-2 justify-center w-full">
                            <a href="{{ route('products.show', $product->id) }}" class="px-3 py-1 rounded-md bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="px-3 py-1 rounded-md bg-indigo-100 hover:bg-indigo-200 text-indigo-700 text-sm">Edit</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection