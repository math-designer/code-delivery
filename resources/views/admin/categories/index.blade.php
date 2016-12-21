@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Categories</h3>
                <br>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Nova Categoria</a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $categories->render() !!}
            </div>
        </div>
    </div>
@endsection