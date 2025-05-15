<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Mini Shop')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full bg-gray-50 flex items-center justify-center">
  @yield('content')
</body>
</html>