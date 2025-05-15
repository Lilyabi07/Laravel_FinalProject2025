@extends('layouts.app')
@section('title','Checkout')
@section('content')
  <h1 class="text-2xl font-bold mb-4">Checkout</h1>
  <form action="{{ route('checkout.store') }}" method="POST" class="bg-base-100 p-6 rounded-lg shadow-md space-y-6">@csrf
    <div class="form-control"><label class="label"><span class="label-text">Name</span></label><input type="text" name="customer_name" class="input input-bordered w-full" required></div>
    <div class="form-control"><label class="label"><span class="label-text">Email</span></label><input type="email" name="customer_email" class="input input-bordered w-full" required></div>
    <div class="form-control"><label class="label"><span class="label-text">Address</span></label><textarea name="customer_address" rows="3" class="textarea textarea-bordered w-full" required></textarea></div>
    <div class="form-control"><label class="label"><span class="label-text">Payment Type</span></label><select name="payment_type" class="select select-bordered w-full"><option>Credit Card</option><option>PayPal</option><option>Cash on Delivery</option></select></div>
    <button class="btn btn-primary">Place Order</button>
  </form>
@endsection