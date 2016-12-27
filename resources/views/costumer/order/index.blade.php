@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Meus Pedidos</h3>
                <br>
                <a href="{{route('costumer.order.create')}}" class="btn btn-primary">Novo Pedido</a>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>R$ {{$order->total}}</td>
                            <td>{{$order->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $orders->render() !!}
            </div>
        </div>
    </div>
@endsection