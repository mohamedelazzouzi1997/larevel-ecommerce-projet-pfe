@extends('admin.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">

        </div>
        <div class="col-md-10">
            <table class="table table-dark table-hover table-bordered ">
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
