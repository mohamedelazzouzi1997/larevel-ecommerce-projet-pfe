@extends('shop')

@section('title')
<title>Produit</title>
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-weight-bold"><a class="badge  badge-primary text-white" href="{{route('index')}}">Home</a></li>
        <li class="breadcrumb-item font-weight-bold"><a class="badge  badge-primary text-white" href="{{route('category',['id'=>$produit->category->id])}}">{{$produit->category->nom}}</a></li>
    </ol>
</nav>
<main role="main">


    <div class="container">


        <div class="row justify-content-between">

            <div class="col-6">
                <div class="card mb-4 box-shadow ">
                    <img class="card-img-top" src="{{ asset('img\/').$produit->img }}" alt="Card image cap">

                </div>
            </div>
            <div class="col-6">

                <h1 class="jumbotron-heading text-info">{{ $produit->nom }}</h1>
                <strong><h4 class="font-weight-bold">{{ $produit->prixTTC() }} €</h4></strong>
                <p class="lead text-muted">{{ $produit->description }}</p>
                @foreach ($produit->tags as $tag)
                <span  class="card-text "> <a class="badge  badge-info text-white nav-link font-weight-bolder" href="{{ route('show_tag',['id'=>$tag->id]) }}">{{ $tag->nom }}</a></span>
                @endforeach
            </br>
            <form action="{{route('cart_add',['id'=>$produit->id])}}" id="panier_add" method="POST">
                @csrf
                <label for="size">Choisissez votre taille</label>
                <select name="size" id="size" class="form-control">
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="xxl">XXL</option>
                </select>
                <label for="color">Choisissez votre Coleur</label>
                <select name="color" id="color" class="form-control">
                    <option value="blue">blue</option>
                    <option value="red">red</option>
                    <option value="black">black</option>
                    <option value="red">red</option>
                    <option value="white">white</option>
                </select>
                <label for="qty">Quantité</label>
                <input name="qty" id="qty" class=" form-control" type="number" value="1" min="1">
            </form>
               
                    <button type="submit" form="panier_add" class="btn btn-cart my-2 btn-primary btn-block border-primary"><i class="fas fa-shopping-cart"></i> Ajouter au Panier</button>
               

            </div>
        </div>
    </div>

@if(count($produit->recommandations)> 0)
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <h3 class="text-dark">Vous aimerez aussi :</h3>
        <br>
        <br>
        <br>
        </div>
        
        <div class="row">@foreach ($produit->recommandations as $produit_recommande)
            <div class="col-md-3 grow">
                <div style="    border-radius: 0;border: 1px solid rgb(255 255 255 / 13%);margin-right: -28px;" class="card mb-3 box-shadow">
                    <img src="{{ asset('img\/').$produit_recommande->img }}" class="card-img-top img-fluid" alt="Responsive image">
                    <div class="card-body">
                        <h3 class="text-primary">{{ $produit_recommande->nom }}</h3>
                        <p style="height: 70px;" class="card-text">{{ $produit_recommande->description }}</p>
                        <div class="d-flex justify-content-between align-items-center"> 
                            <span class="price"><strong>{{ number_format($produit_recommande->prix_ht,2)  }} €</strong></span>  
                          
                            <div class="btn-group">
                                <a href="{{ route('show_produit',["id" =>$produit_recommande->id]) }}" class="btn btn-sm  btn-warning"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  @endforeach
        </div>
        
      
    </div>
</div>
@endif

</main>
@endsection