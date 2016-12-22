<div class="form-group">
    {!! Form::label('client_id', 'Cliente:') !!}
    {!! Form::select('client_id', $clientsDropdown, null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('user_deliveryman_id', 'Entregador:') !!}
    {!! Form::select('user_deliveryman_id', $clientsDropdown, null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('product_id', 'Produtos:') !!}
    {!! Form::select('product_id', $products, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
</div>