@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Clientes</h3>
                <br>
                <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">Novo Cliente</a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->user->name}}</td>
                                <td>
                                    <a class="btn btn-default btn-sm" href="{{ route('admin.clients.edit', $client->id) }}">Editar</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.clients.destroy', $client->id) }}">Remover</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $clients->render() !!}
            </div>
        </div>
    </div>
@endsection