@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Novo Produto</h3>
                <div class="col-md-6">
                    @include('errors._check')
                    {!! Form::open(['route' => 'admin.products.store']) !!}
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