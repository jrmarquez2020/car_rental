@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>Edit Car</h1>
    <form action="{{ route('admin.cars.update', $car->CAR_ID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Car Name -->
        <div class="mb-3">
            <label for="CAR_NAME" class="form-label">Car Name</label>
            <input type="text" class="form-control @error('CAR_NAME') is-invalid @enderror" 
                   id="CAR_NAME" name="CAR_NAME" value="{{ old('CAR_NAME', $car->CAR_NAME) }}" required>
            @error('CAR_NAME')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Fuel Type -->
        <div class="mb-3">
            <label for="FUEL_TYPE" class="form-label">Fuel Type</label>
            <select class="form-control @error('FUEL_TYPE') is-invalid @enderror" 
                    id="FUEL_TYPE" name="FUEL_TYPE" required>
                <option value="Petrol" {{ old('FUEL_TYPE', $car->FUEL_TYPE) == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                <option value="Diesel" {{ old('FUEL_TYPE', $car->FUEL_TYPE) == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                <option value="Electric" {{ old('FUEL_TYPE', $car->FUEL_TYPE) == 'Electric' ? 'selected' : '' }}>Electric</option>
                <option value="Hybrid" {{ old('FUEL_TYPE', $car->FUEL_TYPE) == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>
            @error('FUEL_TYPE')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Capacity -->
        <div class="mb-3">
            <label for="CAPACITY" class="form-label">Capacity</label>
            <input type="number" class="form-control @error('CAPACITY') is-invalid @enderror" 
                   id="CAPACITY" name="CAPACITY" value="{{ old('CAPACITY', $car->CAPACITY) }}" min="1" required>
            @error('CAPACITY')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label for="PRICE" class="form-label">Price</label>
            <input type="number" class="form-control @error('PRICE') is-invalid @enderror" 
                   id="PRICE" name="PRICE" step="0.01" value="{{ old('PRICE', $car->PRICE) }}" required>
            @error('PRICE')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Car Image -->
        <div class="mb-3">
            <label for="CAR_IMG" class="form-label">Car Image</label>
            <input type="file" class="form-control @error('CAR_IMG') is-invalid @enderror" 
                   id="CAR_IMG" name="CAR_IMG" accept="image/*">
            @if ($car->CAR_IMG)
                <small>Current image: <img src="{{ asset('storage/' . $car->CAR_IMG) }}" width="100"></small>
            @endif
            @error('CAR_IMG')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Availability -->
        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <select class="form-control @error('availability') is-invalid @enderror" 
                    id="availability" name="availability" required>
                <option value="Available" {{ old('availability', $car->availability) == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Unavailable" {{ old('availability', $car->availability) == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
            @error('availability')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="CATEGORY" class="form-label">Category</label>
            <select class="form-control @error('CATEGORY') is-invalid @enderror" 
                    id="CATEGORY" name="CATEGORY" required>
                <option value="Sedan" {{ old('CATEGORY', $car->CATEGORY) == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                <option value="SUV" {{ old('CATEGORY', $car->CATEGORY) == 'SUV' ? 'selected' : '' }}>SUV</option>
                <option value="Van" {{ old('CATEGORY', $car->CATEGORY) == 'Van' ? 'selected' : '' }}>Van</option>
                <option value="MPV" {{ old('CATEGORY', $car->CATEGORY) == 'MPV' ? 'selected' : '' }}>MPV</option>
            </select>
            @error('CATEGORY')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
