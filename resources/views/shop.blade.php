<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    @yield('title')
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
    <link href="{{asset('css/tshirt.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('img/icon.jpg')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
</head>

<body>
    @include('layout.header')
    @yield('content')

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
               <strong><a href="#">Back to top</a></strong>
            </p>
            <strong><p>E_commerce_Laravel</p></strong>
        </div>


      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


      <!-- Additional Scripts -->
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
      <script src="{{ asset('js/jquery.min.js') }}" ></script>
      <script src="{{ asset('js/custom.js') }}" ></script>
      <script src="{{ asset('js/owl.js') }}" ></script>

          <script src="{{ asset('js/app_js.js') }}" ></script>
          <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
          <script src="{{ asset('js/holder.min.js') }}" ></script>
          <script src="{{ asset('js/popper.min.js') }}" ></script>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        @yield('js')
         @include('layout.footer')
        </body>
      </html>
