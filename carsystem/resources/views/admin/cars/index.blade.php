@extends('layouts.admin')

@section('title', 'Manage Cars')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Manage Cars</h1>

    <!-- Button to navigate to Create Car Form -->
    <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">
            Add New Car
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Car Name</th>
                <th>Fuel Type</th>
                <th>Capacity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Availability</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cars as $index => $car)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $car->CAR_NAME }}</td>
                    <td>{{ $car->FUEL_TYPE }}</td>
                    <td>{{ $car->CAPACITY }}</td>
                    <td>₱{{ number_format($car->PRICE, 2) }}</td>
                    <td>
                        @if ($car->CAR_IMG)
                            <img src="{{ asset('storage/' . $car->CAR_IMG) }}" alt="{{ $car->CAR_NAME }}" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        {{ $car->availability ? 'Available' : 'Not Available' }}
                    </td>
                    <td>{{ $car->CATEGORY }}</td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <a href="{{ route('admin.cars.edit', $car->CAR_ID) }}" class="btn btn-sm btn-success me-2">
                                Edit
                            </a>
                            <form action="{{ route('admin.cars.destroy', $car->CAR_ID) }}" method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this car?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No cars available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
