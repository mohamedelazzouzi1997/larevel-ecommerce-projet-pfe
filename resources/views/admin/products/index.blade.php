@extends('admin.index')
@section('title')
    Admin Product
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">

        </div>
        <div class="col-md-10">
            <table class="table table-dark table-hover table-bordered ">
                <thead>
                    <th>id</th>
                    <th>img</th>
                    <th>name</th>
                    <th>description</th>
                    <th>prix_ht</th>
                    <th>Category</th>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            <td>{{ $produit->id }}</td>
                            <td><a href="{{ route('show_produit',["id" =>$produit->id]) }}"><img width="110" class="rounded-circle img-thumbnail" src="{{ asset('img\/'.$produit->img) }}" alt=""></a></td>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>{{ $produit->prix_ht }}</td>
                            <td>{{ $produit->category->nom }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <hr>
                 <div class=" d-flex justify-content-center">
                    {{ $orders->links() }}
                </div>
        </div>
    </div>
</div>
@endsection
