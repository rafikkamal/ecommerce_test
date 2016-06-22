@extends('layouts.app')
@section('content')
<h1>Create Category </h1>
{{ Form::open(array('url' => 'categories')) }}

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

{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

@endsection