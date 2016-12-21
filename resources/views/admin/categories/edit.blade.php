@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Editar Categoria</h3>
                <div class="col-md-6">
                    @include('errors._check')
                    {!! Form::model($category, ['route' => ['admin.categories.update', $category->id]]) !!}
                        @include('admin.categories._form')
                        <div class="form-group">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection