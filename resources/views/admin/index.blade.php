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
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Admin Home') }}
        </h2>
    </x-slot>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="{{ route('product.admin') }}" style="text-decoration: none">
                <div class="card bg-info text-white">
                    <div class=" card-body d-flex flex-colum justify-content-center" >
                        <h3>Produit {{ $produit->count() }}</h3>

                    </div>
                </div>
            </a>
        </div>
         <div class="col-md-4">
            <a href="{{ route('orders.admin') }}" style="text-decoration: none">
                <div class="card bg-success text-white">
                    <div class="card-body d-flex  justify-content-center" >
                        <h3>Orders {{ $orders->count() }}</h3>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>


</x-app-layout>@yield('content')
