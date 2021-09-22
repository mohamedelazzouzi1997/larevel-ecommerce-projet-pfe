@extends('admin.index')
@section('title')
    Admin Product
@endsection
@section('content')

<div class="container">
@include('layout.alerts')

    <div class=" d-flex row justify-content-center">

        <div class="col-md-12">
            <table class="table table-light table-hover table-bordered  ">
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
                            <td class="d-flex flex-row justify-content-center align-items-center">
                                <form action="{{ route('Product.edit',$produit->id) }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" name="id" value="{{ $produit->id }}">
                                    <button type="submit" style="margin-right: 5px" class="btn btn-warning btn-sm  ">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </form>
                                <form id="{{ $produit->id }}" action="{{ route('Product.destroy',$produit->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                     <input type="hidden" name="id" value="{{ $produit->id }}">
                                    <button type="submit"
                                        onclick="event.preventDefault();
                                            if(confirm('Confirm Delete Product {{ $produit->id }}'))
                                            document.getElementById({{ $produit->id }}).submit();
                                        "
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <hr>
                 <div class=" d-flex justify-content-center">
                    {{ $produits->links() }}
                </div>
        </div>
    </div>
</div>
@endsection
