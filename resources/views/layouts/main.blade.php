<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  {{--
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

  <!-- Tailwind CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href={{ asset('img/LogoDekranasda.jpg')}}>

  {{-- My Styles --}}
  {{--
  <link rel="stylesheet" href="/css/styles.css"> --}}

  {{-- Turbo --}}
  <script src="{{ asset('js/app.js') }}"></script>

  <title>Dekranasda Kabupaten Bandung Barat</title>
</head>

<body class="bg-[#EDDBC0]">
  <div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <!-- Page content here -->
      @yield('navbar')
      @yield('body')
      @yield('footer')
    </div>
    <div class="drawer-side">
      <label for="my-drawer" class="drawer-overlay"></label>
      <ul class="menu p-4 overflow-y-auto w-80 bg-[#DD5353] text-white">
        <!-- Sidebar content here -->
        @include('layouts.sidebar')
      </ul>
    </div>
  </div>

  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script> --}}
</body>

</html>