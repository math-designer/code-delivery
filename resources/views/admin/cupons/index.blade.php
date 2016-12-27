@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Cupons</h3>
                <br>
                <a href="{{ route('admin.cupons.create') }}" class="btn btn-primary">Novo Cupom</a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cupons as $cupom)
                            <tr>
                                <td>{{$cupom->id}}</td>
                                <td>{{$cupom->code}}</td>
                                <td>R$ {{$cupom->value}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $cupons->render() !!}
            </div>
        </div>
    </div>
@endsection