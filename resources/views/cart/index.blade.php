
@extends('shop')
@section('title')
    <title>Cart</title>
@endsection
@section('content')


@if (auth()->check())

<main role="main">

    <section class="py-5">

        <div class="container">
            @include('layout.alerts')
                <h1 class="jumbotron-heading"> <span class="badge badge-primary ">Votre panier </span></h1>
            <table class="table table-bordered  table-hover table-responsive-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Quantity</th>
                        <th>P / U</th>
                        <th>Total TTC</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contents as $produit)


                <tr>
                    <td style="font-size: 150%">
                        <a href="{{ route('show_produit',["id" =>$produit->id]) }}"><img width="110" class="rounded-circle img-thumbnail" src="{{ asset('img\/'.$produit->attributes->img) }}" alt=""></a>
                        {{$produit->name}}
                    </td>
                    <td>
                        {{strToUpper($produit->attributes->size)}}
                    </td>
                    <td>
                        {{strToUpper($produit->attributes->color)}}
                    </td>
                    <td>   <form action="{{route('cart_update',$produit->id)}}" id="panier_add" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="hidden_id" value="{{$produit->id}}">
                                <input  style="display: inline-block" name="qty"  class="quantity form-control col-sm-4" type="number" min="1" value="{{$produit->quantity}}">
                               <button type="submit" class="btn btn-cart btn-light text-primary"><i class="fas fa-sync"></i></button>
                            </form>
                    </td>
                    <td>
                        {{number_format($produit->attributes->prix_ttc,2)}} €
                    </td>
                    <td>
                        {{number_format($produit->attributes->prix_ttc * $produit->quantity,2)}} €
                    </td>
                    <td>
                        <form action="{{ route('cart_remove',$produit->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class=" btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td>Total HT</td>
                    <td>{{number_format($total_ht_panier,2) }} €</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td>TVA (20%)</td>
                    <td>{{number_format($tva,2) }} €</td>
                </tr>
                <tr class="table-success">
                    <td colspan="4"></td>
                    <td >Total TTC</td>
                    <td style="font-weight: bolder">{{number_format($total_ttc_panier,2) }} €</td>
                </tr>
                </tfoot>
            </table>
            @if ($total_ttc_panier > 0)
            <div class="form-group">
                <a style="font-weight: bolder" class=" text-dark btn btn-block btn-success " href="{{ route('cart_commande') }}">
                    Order Now
                </a>
            </div>

            @endif

        </div>
    </section>
</main>
@else

@endif
@endsection
@section('js')


@endsection

