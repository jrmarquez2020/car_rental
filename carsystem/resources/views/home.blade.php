@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center text-white mb-4">Our Cars Overview</h2>
    <div class="row justify-content-center">

    
    <!-- Filter Dropdown (Optional) -->
    <div class="text-center mb-5">
    <label class="text-white">Choose a category:</label>
    <select id="categoryFilter" class="form-select w-auto d-inline" style="background-color: #FF7200; color: white;">
        <option value="all">All</option>
        <option value="sedan">Sedan</option>
        <option value="suv">SUV</option>
    </select>
</div>
        @foreach ($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $car->CAR_IMG) }}" class="card-img-top" alt="{{ $car->CAR_NAME }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->CAR_NAME }}</h5>
                    <p class="card-text">
                        <strong>Category:</strong> {{ $car->CATEGORY }}<br>
                        <strong>Fuel Type:</strong> {{ $car->FUEL_TYPE }}<br>
                        <strong>Capacity:</strong> {{ $car->CAPACITY }}<br>
                        <strong>Rent Per Day:</strong> {{ number_format($car->PRICE, 2) }} Pesos
                    </p>
                    <!-- Updated: Link to the booking form -->
                    <a href="{{ route('cars.book', $car->CAR_ID) }}" class="btn btn-warning w-100">Book</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryFilter = document.getElementById('categoryFilter');
        const carItems = document.querySelectorAll('.car-item');

        categoryFilter.addEventListener('change', function () {
            const selectedCategory = categoryFilter.value;

            carItems.forEach(item => {
                const carCategory = item.getAttribute('data-category');

                if (selectedCategory === 'all' || carCategory === selectedCategory) {
                    item.style.display = '';  // Show the car item
                } else {
                    item.style.display = 'none';  // Hide the car item
                }
            });
        });
    });
</script>
@endsection