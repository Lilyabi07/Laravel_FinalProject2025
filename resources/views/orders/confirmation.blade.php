@extends('layouts.app')
@section('title','Order Confirmed')
@section('content')
  <div class="text-center space-y-4">
    <x-heroicon-o-check-circle class="w-16 h-16 text-green-500 mx-auto" />
    <h1 class="text-3xl font-bold">Thank You!</h1>
    <p>Your order #{{ $order->id }} has been placed successfully.</p>
    <p>Total: ${{ number_format($order->total_amount,2) }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Continue Shopping</a>
  </div>
@endsection