<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tailwind CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href={{ asset('img/LogoDekranasda.png')}}>

  {{-- Turbo --}}
  <script src="{{ asset('js/app.js') }}"></script>

  <title>Dekranasda Kabupaten Bandung Barat</title>
</head>

<body class="bg-[#EDDBC0]">
  <div class="drawer drawer-end">
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

  <!--Start of Tawk.to Script-->
  {{-- <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/635fc668daff0e1306d4e770/1ggn1u38o';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script> --}}
  <!--End of Tawk.to Script-->
</body>

</html>