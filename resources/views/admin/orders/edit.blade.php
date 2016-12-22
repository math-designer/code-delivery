@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Pedido # {{$order->id}} - {{$order->total}}</h3>
                <h3>Cliente: {{$order->client->user->name}}</h3>
                <h4>Data: {{$order->created_at}}</h4>
                
                <p>
                    <b>Entregar em</b>: <br>
                    {{$order->client->address}} - {{$order->client->city}}, {{$order->client->state}}
                </p>
                <br>
                
                {!! Form::open(['route' => ['admin.orders.update', $order->id], 'class' => 'col-md-3']) !!}
                    <div class="form-group">
                        {!! Form::label('status', 'Status:') !!}
                        {!! Form::select('status', $statusDropdown, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('user_deliveryman_id', 'Entregador:') !!}
                        {!! Form::select('user_deliveryman_id', $deliverymanDropdown, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection