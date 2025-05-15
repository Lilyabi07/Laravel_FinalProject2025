@extends('layouts.app')
@section('title','Add Product')
@section('content')
  <h1 class="text-2xl font-bold mb-4">Add New Product</h1>
  <form action="{{ route('products.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-base-100 p-6 rounded-lg shadow-md space-y-6">
    @csrf
    @include('products._form', ['product' => new \App\Models\Product])
    <button class="btn btn-success">Save Product</button>
  </form>
@endsection