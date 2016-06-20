@extends('layouts.app')
@section('content')
<table class='table table-bordered table-responsive'>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->title }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
    </tr>
</table>
@endsection