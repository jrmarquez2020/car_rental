@extends('layout')

@section('title', 'Manage Cars')

@section('content')
<h1>Manage Cars</h1>
<a href="/admin/cars/create">Add New Car</a>
<table>
    <thead>
        <tr>
            <th>Model</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->model }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->price_per_day }}</td>
                <td>
                    <a href="/admin/cars/{{ $car->id }}/edit">Edit</a>
                    <form action="/admin/cars/{{ $car->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
