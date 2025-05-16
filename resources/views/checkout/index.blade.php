@extends('layouts.app')
@include('partials.flash')

@section('content')
<div class="min-h-screen bg-[#001220] flex flex-col items-center pt-16 pb-16 relative overflow-hidden">
    <img 
        src="{{ asset('images/PolygonLuminary.svg') }}" 
        alt="Polygon Mesh Decorative SVG" 
        class="absolute left-0 top-0 w-full h-full"
        style="object-fit: cover; z-index: 0; pointer-events: none; user-select: none;"
    />
    <div class="relative z-10 bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl p-10 border border-white/20 w-full max-w-2xl">
        <h1 class="text-3xl font-bold text-white mb-8">Checkout</h1>
        <form method="POST" action="{{ route('checkout.store') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-white/80 mb-1" for="customer_name">Name</label>
                <input type="text" name="customer_name" id="customer_name" required class="w-full px-4 py-2 rounded-lg bg-white/30 border border-white/40 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('customer_name') }}">
            </div>
            <div>
                <label class="block text-white/80 mb-1" for="customer_email">Email</label>
                <input type="email" name="customer_email" id="customer_email" required class="w-full px-4 py-2 rounded-lg bg-white/30 border border-white/40 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('customer_email') }}">
            </div>
            <div>
                <label class="block text-white/80 mb-1" for="customer_address">Address</label>
                <input type="text" name="customer_address" id="customer_address" required class="w-full px-4 py-2 rounded-lg bg-white/30 border border-white/40 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('customer_address') }}">
            </div>
            <div>
                <label class="block text-white/80 mb-1">Payment Method</label>
                <div class="flex gap-6">
                    <label class="flex items-center gap-2 text-white/80">
                        <input type="radio" name="payment_type" value="card" required class="accent-yellow-400"> Card
                    </label>
                    <label class="flex items-center gap-2 text-white/80">
                        <input type="radio" name="payment_type" value="cash" required class="accent-yellow-400"> Cash
                    </label>
                </div>
            </div>
            <div class="flex justify-between items-center mt-8">
                <span class="text-xl text-yellow-300 font-bold">Total: ${{ number_format($total, 2) }}</span>
                <button type="submit" class="px-8 py-3 rounded-xl bg-yellow-300 text-[#001220] font-semibold hover:bg-yellow-200 transition shadow">Place Order</button>
            </div>
        </form>
    </div>
</div>
@endsection