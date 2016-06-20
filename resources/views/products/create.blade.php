@extends('layouts.app')
@section('content')
<h1>Create Product </h1>
{{ Form::open(array('url' => 'products', 'enctype' => 'multipart/form-data')) }}

@if ($errors->has('title'))
<div class="alert alert-danger">
    <strong>
        {{ $errors->first('title') }}
    </strong>
</div>
@endif

<div class="form-group">
    {{ Form::label('title','Title') }}
    {{ Form::text('title',null,array('class'=>'form-control','placeholder'=>'Title')) }}
</div>

<div class="form-group">
    {{ Form::label('category','Category') }}
    {{ Form::select('category',$categories,null,['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('price','Price') }}
    {{ Form::text('price',null,array('class'=>'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('stock','Stock') }}
    {{ Form::text('stock',null,array('class'=>'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('picture','image') }}
    {{ Form::file('picture') }}
</div>

{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

@endsection