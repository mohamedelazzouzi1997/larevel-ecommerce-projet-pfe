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
                <h3 class="card-title">Add Product</h3>
                <div class="card-body">
                    <form action="{{ route('Product.store') }}" class=" form-group" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" cols="5" placeholder="Description" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="prix_ht" min="0" placeholder="price_ht">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="file" name="img" >
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category_id" id="">
                            <option disabled>Selecte Category</option>
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->nom }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Store Product</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
