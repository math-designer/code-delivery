@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Editar Produto</h3>
                <div class="col-md-6">
                    @include('errors._check')
                    {!! Form::model($product, ['route' => ['admin.products.update', $product->id]]) !!}
                        @include('admin.products._form')
                        <div class="form-group">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection