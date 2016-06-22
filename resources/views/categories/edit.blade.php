@extends('layouts.app')

@section('content')
<h1>Edit Category </h1>
{{ Form::open(array('route' => ['categories.update',$category->id], 'method'=>'patch')) }}

@if ($errors->has('title'))
<div class="alert alert-danger">
    <strong>
        {{ $errors->first('title') }}
    </strong>
</div>
@endif

<div class="form-group">
    {{ Form::label('title','Title') }}
    {{ Form::text('title',$category->title,array('class'=>'form-control','placeholder'=>'Category Title')) }}
</div>
            
{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

@endsection