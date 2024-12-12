@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Car</h1>
    <form action="{{ route('admin.cars.update', $car->CAR_ID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="CAR_NAME" class="form-label">Car Name</label>
            <input type="text" class="form-control" id="CAR_NAME" name="CAR_NAME" value="{{ $car->CAR_NAME }}" required>
        </div>
        <div class="mb-3">
            <label for="CAR_BRAND" class="form-label">Brand</label>
            <input type="text" class="form-control" id="CAR_BRAND" name="CAR_BRAND" value="{{ $car->CAR_BRAND }}" required>
        </div>
        <div class="mb-3">
            <label for="CAR_PRICE" class="form-label">Price per Day</label>
            <input type="number" class="form-control" id="CAR_PRICE" name="CAR_PRICE" value="{{ $car->CAR_PRICE }}" required>
        </div>
        <div class="mb-3">
            <label for="CAR_IMAGE" class="form-label">Car Image</label>
            <input type="file" class="form-control" id="CAR_IMAGE" name="CAR_IMAGE">
            <small>Leave blank to keep the existing image</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
