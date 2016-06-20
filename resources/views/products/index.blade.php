@extends('layouts.app')

@section('content')
<h1>All Product Available</h1>
<p><a href="{{ route('products.create') }}">Add new product</a></p>

@if ($products->count())
<table class='table table-striped table-bordered table-responsive'>
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
<div class='text-center'>
    {!! $products->links(); !!}
</div>
@else
<div class='empty'>
    Nothing Found.
</div>
@endif

@endsection