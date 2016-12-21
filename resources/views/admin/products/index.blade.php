@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Produtos</h3>
                <br>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Novo Produto</a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>
                                    <a class="btn btn-default btn-sm" href="{{ route('admin.products.edit', $product->id) }}">Editar</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.products.destroy', $product->id) }}">Remover</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $products->render() !!}
            </div>
        </div>
    </div>
@endsection