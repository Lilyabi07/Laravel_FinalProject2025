@extends('layouts.app')
@section('title','Edit Product')
@section('content')
  <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
  <form action="{{ route('products.update', $product) }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-base-100 p-6 rounded-lg shadow-md space-y-6">
    @csrf @method('PUT')
    @include('products._form')
    <button class="btn btn-primary">Update Product</button>
  </form>
@endsection
