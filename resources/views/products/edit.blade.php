@extends('layouts.app')

@section('content')
<h1>Edit Product </h1>
{{ Form::open(array('route' => ['products.update',$product->id], 'method'=>'patch', 'enctype' => 'multipart/form-data')) }}

@if ($errors->has('title'))
<div class="alert alert-danger">
    <strong>
        {{ $errors->first('title') }}
    </strong>
</div>
@endif

<div class="form-group">
    {{ Form::label('title','Title') }}
    {{ Form::text('title',$product->title,array('class'=>'form-control','placeholder'=>'Title')) }}
</div>

<div class="form-group">
    {{ Form::label('category','Category') }}
    {{ Form::select('category',$categories,null,['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('price','Price') }}
    {{ Form::text('price',$product->price,array('class'=>'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('stock','Stock') }}
    {{ Form::text('stock',$product->stock,array('class'=>'form-control')) }}
</div>


{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}


<div class="form-group">
    {{ Form::label('stock','Stock') }}
    {{ Form::text('stock',$product->stock,array('class'=>'form-control')) }}
</div>


<h1>Edit Product Picture</h1>
{{ Form::open(array('route' => ['products.picture',$product->id], 
            'method'=>'patch', 'enctype' => 'multipart/form-data')) }}

<div class="form-group">
    {{ Form::label('picture','image') }}
    {{ Form::file('picture') }}
</div>
            
{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

@endsection