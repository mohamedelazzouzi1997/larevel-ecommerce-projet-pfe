@extends('shop')
@section('title')
<title>Category</title>
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if(isset($Category))
        @if($Category->parent_id !== null)
        <li class=" breadcrumb-item active  " aria-current="page"><a  class="badge badge-danger text-white" href="{{ route('category',['id'=>$Category->parent->id]) }}"><strong class="">{{ $Category->parent->nom }}</strong></a></li>
        @endif
        
        <li class=" breadcrumb-item active  " aria-current="page"><strong class="badge badge-primary text-white">{{ $Category->nom }}</strong></li>
        @foreach ($Category->childrens as $childrent)
        <li  class=" breadcrumb-item active"><a  class=" text-white badge badge-danger " href="{{ route('category',['id'=>$childrent->id]) }}">{{ $childrent->nom }}</a></li>
        @endforeach
        @else
        {{-- <li class=" breadcrumb-item active  " aria-current="page"><strong style="font-size:small" class="badge badge-danger text-white">{{ $tag->nom }}</strong></li> --}}
        @endif
    </ol>
</nav>
<main role="main">

    <div class="py-3">
        <div class="container-fluid">
            <div class="row">
                @foreach ($produits as $produit)
                <div class="col-md-3 grow">
                    <div style="margin-bottom: 30px;    border-radius: 0;border: 1px solid rgb(255 255 255 / 13%);margin-right: -28px;" class="card mb-3 box-shadow">
                        <img style="    height: 350px;" src="{{ asset('img\/').$produit->img }}" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <p class="card-text"><h3>{{ $produit->nom }}</h3>{{ $produit->description }}</p>
                       {{-- <div class="d-flex justify-content-between">
                        <span class="price"><strong>{{ number_format($produit->prix_ht,2)  }} €</strong></span>  
                       </div> --}}
                            <div class="d-flex justify-content-between align-items-center"> 
                                <span class="price"><strong>{{  $produit->prixTTC()  }} €</strong></span>  
                                <span  class="card-text "> <a class="badge  badge-info text-white nav-link font-weight-bolder" href="{{ route('category',['id'=>$produit->category->id]) }}">{{ $produit->category->nom }}</a></span>
                                <div class="btn-group">
                                    <a href="{{ route('show_produit',["id" =>$produit->id]) }}" class="btn btn-sm  btn-warning"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>
            @if(isset($Category))
            <div class="d-flex justify-content-center">
                {{ $produits->links() }}
               </div>
            <div class="row">
               @endif
            </div>
        </div>
    </div>

</main>
@endsection