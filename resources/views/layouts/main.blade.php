<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @if(@isset($title))
  <meta name="description" content="{{ $title }}">
  @else
  <meta name="description" content="Dekranasda KBB">
  @endif

  <!-- Tailwind CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href={{ asset('img/LogoDekranasda.png')}}>

  {{-- Turbo --}}
  <script src="{{ asset('js/app.js') }}"></script>

  @if(@isset($title))
  <title>{{ $title }}</title>
  @else
  <title>Dekranasda KBB</title>
  @endif
</head>

<body class="bg-[#F3EED9]">
  <div class="drawer drawer-end">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <!-- Page content here -->
      @yield('navbar')
      <div
        class="{{ (Request::is('/') || Request::is('login*') || Request::is('register*') || Request::is('aboutus*')) ? '' : 'px-5 md:px-12'}}">
        @yield('body')
      </div>
      @yield('footer')
    </div>
    <div class="drawer-side">
      <label for="my-drawer" class="drawer-overlay"></label>
      <ul class="menu p-4 overflow-y-auto w-80 bg-[#e00024] text-white">
        <!-- Sidebar content here -->
        @include('layouts.sidebar')
      </ul>
    </div>
  </div>
</body>

</html>