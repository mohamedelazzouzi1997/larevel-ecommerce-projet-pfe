@extends('admin.index')
@section('title')
    Add Product
@endsection
@section('content')

<div class="container">
@include('layout.alerts')

    <div class=" d-flex row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">Edit Product {{ $produit->id }}</h3>
                <div class="card-body">
                    <form action="{{ route('Product.update',$produit->id) }}" class=" form-group" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <input value="{{ $produit->nom }}" class="form-control" type="text" name="name" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" cols="5" placeholder="Description" rows="2">{{ $produit->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <input value="{{ $produit->prix_ht }}" class="form-control" type="number" name="prix_ht" min="0" placeholder="price_ht">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="img_name" value="{{ $produit->img }}">
                        <a href="{{ route('show_produit',["id" =>$produit->id]) }}"><img width="110" class="rounded-circle img-thumbnail" src="{{ asset('img\/'.$produit->img) }}" alt=""></a></td>
                    </div>
                    <div class="form-group">
                        <input  class="form-control" type="file" name="img" value="{{ $produit->img }}" >
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category_id" id="">
                            <option disabled>Selecte Category</option>
                            @foreach ($categorys as $category)
                                <option
                                {{ $produit->category_id === $category->id ? "selected" : "" }}
                                value="{{ $category->id }}">{{ $category->nom }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-block">Edit Product</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
