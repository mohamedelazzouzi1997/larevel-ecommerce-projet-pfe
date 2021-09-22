@extends('admin.index')
@section('title')
    Admin Orders
@endsection
@section('content')
<div class="container">
    @include('layout.alerts')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <table class="table table-light table-hover table-bordered ">
                <thead>
                    <th>Order id</th>
                    <th>User Name</th>
                    <th>Product name</th>
                    <th>Paid</th>
                    <th>size</th>
                    <th>Color</th>
                    <th>qty</th>
                    <th>price</th>
                    <th>Total</th>
                    <th>Livred</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->product_name }}</td>
                            <td> @if($order->paid == 1)
                                    <i class="fas fa-check text-success"></i>
                                @else
                                    <i class="fas fa-times text-danger"></i>
                                @endif
                            </td>
                            <td>{{ $order->size }}</td>
                            <td>{{ $order->color }}</td>
                            <td>{{ $order->qty }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->total }}</td>
                            <td> @if($order->livred == 1)
                                    <i class="fas fa-check text-success"></i>
                                @else
                                    <i class="fas fa-times text-danger"></i>
                                @endif
                            </td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                                <form action="{{ route('Order.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    <button type="submit" style="margin-right: 5px" class="btn btn-success btn-sm  ">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form id="{{ $order->id }}" action="{{ route('Order.destroy',$order->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                     <input type="hidden" name="id" value="{{ $order->id }}">
                                    <button type="submit"
                                        onclick="event.preventDefault();
                                            if(confirm('Confirm Delete Order {{ $order->id }}'))
                                            document.getElementById({{ $order->id }}).submit();
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
                    {{ $orders->links() }}
                </div>
        </div>
    </div>
</div>
@endsection
