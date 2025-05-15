<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Mini Shop')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">
  <header class="bg-white shadow sticky top-0 z-20">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <a href="{{ route('products.index') }}" class="text-lg font-bold text-gray-800">
        Mini Shop
      </a>

      <nav class="flex items-center space-x-6">
        @auth
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-gray-600 hover:text-gray-800">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}"   class="text-gray-600 hover:text-gray-800">Login</a>
          <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Sign Up</a>
        @endauth

        @php
          $cart = session('cart', []);
          $count = array_sum(array_column($cart, 'quantity'));
        @endphp

        <a href="{{ route('cart.index') }}" class="flex items-center space-x-1 text-gray-600 hover:text-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4" />
            <circle cx="7" cy="21" r="1" />
            <circle cx="17" cy="21" r="1" />
          </svg>
          <span class="text-sm font-medium">{{ $count }}</span>
        </a>
      </nav>
    </div>
  </header>

  <main class="pt-6">
    @yield('content')
  </main>
</body>
</html>