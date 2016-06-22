@extends('layouts.app')
@section('content')
<table class='table table-bordered table-responsive'>
    <tr>
        <th>#</th>
        <th>Title</th>
    </tr>
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->title }}</td>
    </tr>
</table>
@endsection