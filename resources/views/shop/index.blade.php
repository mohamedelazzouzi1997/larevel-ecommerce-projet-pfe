@extends('home')
@section('title')
<title>Home</title>
@endsection
@section('content')
<section class="py-5 text-center">
  <div class="container">
      <h1 class="jumbotron-heading">Order Your <br><span class="badge badge-light">New</span> <br>T-Shirt <span class="badge badge-primary ">prefer !</span></h1>
      <p class="lead text-muted font-weight-bolder">Chose THE T-Shirt of your favorite category</p>

  </div>
</section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        @foreach ($Produits as $Produit)
          <div style="margin-bottom: 30px; border:none" class="col grow ">
            <div style="    border-radius: 0;margin-top: -28px;border: 1px solid rgb(255 255 255 / 13%);margin-right: -28px;height: 412px;" class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset('img\/').$Produit->img }}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>
              <div class="card-body">
                <h3>{{ $Produit->nom }}</h3>
                <p class="card-text" style="height: 70px;">{{ $Produit->description }} <p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price"><strong>{{  $Produit->prixTTC() }} €</strong></span>
                  <span  class="card-text "> <a class="badge  badge-info text-white nav-link font-weight-bolder" href="{{ route('category',['id'=>$Produit->category->id]) }}">{{ $Produit->category->nom }}</a></span>
                  <a href="{{ route('show_produit',["id" =>$Produit->id]) }}" class="btn btn-sm  btn-warning"><i class="fas fa-eye"></i></a>
              </div>
              </div>
            </div>



          </div>
        @endforeach

      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $Produits->links() }}
   </div>
@endsection
