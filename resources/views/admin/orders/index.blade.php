@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Pedidos</h3>
                <br>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Total</th>
                            <th>Data</th>
                            <th>Itens</th>
                            <th>Status</th>
                            <th>Entregador</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>R$ {{$order->total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <ul>
                                        @foreach($order->items as $item)
                                            <li>{{ $item->product->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{$order->status}}</td>
                                <td>
                                    @if($order->deliveryman)
                                        {{$order->deliveryman->name}}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-default btn-sm" href="{{ route('admin.orders.edit', $order->id) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $orders->render() !!}
            </div>
        </div>
    </div>
@endsection