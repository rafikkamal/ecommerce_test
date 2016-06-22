@extends('layouts.app')

@section('content')
<h1>All Product Available</h1>
<p><a href="{{ route('categories.create') }}">Add new category</a></p>

@if ($categories->count())
<table class='table table-striped table-bordered table-responsive'>
    <thead>
        <tr>
            <th>#</th>
            <th>Category</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
<div class='text-center'>
    {!! $categories->links(); !!}
</div>
@else
<div class='empty'>
    Nothing Found.
</div>
@endif

@endsection