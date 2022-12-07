<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dasbor</title>

  <!-- Bootstrap core CSS -->

  {{--
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href={{ asset('img/LogoDekranasda.png')}}>


  <!-- Tailwind CSS -->

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  {{--
  <link href="/css/dashboard.css" rel="stylesheet"> --}}

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

  {{-- Trix Editor --}}
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <script type="text/javascript" src="/js/trix.js"></script>

  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }

    trix-toolbar [data-trix-button-group="block-tools"] {
      display: none;
    }

    trix-toolbar [data-trix-button-group="history-tools"] {
      display: none;
    }

    trix-toolbar [data-trix-action="link"] {
      display: none;
    }
  </style>

  {{-- Turbo --}}
  <script src="{{ asset('js/app.js') }}"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
  </script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
  </script>
</head>

<body class="bg-slate-700 min-h-screen">

  {{-- @include('dashboard.layouts.header')

  <div class="container-fluid">
    <div class="row">
      @include('dashboard.layouts.sidebar')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('container')
      </main>
    </div>
  </div> --}}
  @include('dashboard.layouts.header')
  <div class="px-4 lg:px-0">
    @yield('container')
  </div>
  @include('dashboard.layouts.sidebar')


  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
  </script> --}}

  {{-- <script src="/js/dashboard.js"></script> --}}

</body>

</html>