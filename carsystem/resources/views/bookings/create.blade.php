@extends('layouts.app')

@section('title', 'Book a Car')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <!-- Card Header -->
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Book {{ $car->CAR_NAME }} - {{ $car->CATEGORY }}</h3>
        </div>

        <!-- Car Image Section -->
        <div class="row g-0">
            <div class="col-md-5">
                @if($car->image_path && file_exists(public_path('storage/' . $car->image_path)))
                    <img src="{{ asset('storage/' . $car->image_path) }}" 
                         alt="{{ $car->CAR_NAME }} - {{ $car->CATEGORY }}" 
                         class="img-fluid rounded-start" 
                         style="height: 100%; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/500x300?text=No+Image" 
                         alt="No Image Available" 
                         class="img-fluid rounded-start" 
                         style="height: 100%; object-fit: cover;">
                @endif
            </div>

            <!-- Form Section -->
            <div class="col-md-7">
                <div class="card-body">
                    <h4 class="mb-3">Fill Out Your Booking Details</h4>
                    <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="CAR_ID" value="{{ $car->CAR_ID }}">

                        <!-- Phone Number -->
                        <div class="form-group mb-3">
                            <label for="PHONE_NUMBER" class="form-label">Phone Number</label>
                            <input type="text" name="PHONE_NUMBER" class="form-control @error('PHONE_NUMBER') is-invalid @enderror" 
                                   placeholder="Enter your phone number" value="{{ old('PHONE_NUMBER', $user->phone_number ?? '') }}" required>
                            @error('PHONE_NUMBER')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Booking Place -->
                        <div class="form-group mb-3">
                            <label for="BOOK_PLACE" class="form-label">Booking Place</label>
                            <input type="text" name="BOOK_PLACE" class="form-control @error('BOOK_PLACE') is-invalid @enderror" 
                                   placeholder="Where are you booking from?" value="{{ old('BOOK_PLACE') }}" required>
                            @error('BOOK_PLACE')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Booking Date -->
                        <div class="form-group mb-3">
                            <label for="BOOK_DATE" class="form-label">Booking Date</label>
                            <input type="date" id="BOOK_DATE" name="BOOK_DATE" class="form-control @error('BOOK_DATE') is-invalid @enderror" 
                                   value="{{ old('BOOK_DATE') }}" required>
                            @error('BOOK_DATE')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Duration -->
                        <div class="form-group mb-3">
                            <label for="DURATION" class="form-label">Duration (days)</label>
                            <input type="number" id="DURATION" name="DURATION" class="form-control @error('DURATION') is-invalid @enderror" 
                                   min="1" value="{{ old('DURATION') }}" required>
                            @error('DURATION')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Destination -->
                        <div class="form-group mb-3">
                            <label for="DESTINATION" class="form-label">Destination</label>
                            <input type="text" name="DESTINATION" class="form-control @error('DESTINATION') is-invalid @enderror" 
                                   placeholder="Enter your destination" value="{{ old('DESTINATION') }}" required>
                            @error('DESTINATION')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- ID Photo -->
                        <div class="form-group mb-3">
                            <label for="ID_PHOTO" class="form-label">ID Photo (optional)</label>
                            <input type="file" name="ID_PHOTO" class="form-control-file @error('ID_PHOTO') is-invalid @enderror" accept="image/*">
                            @error('ID_PHOTO')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price per Day -->
                        <div class="form-group mb-3">
                            <label for="PRICE" class="form-label">Price (per day)</label>
                            <input type="number" name="PRICE" id="PRICE" class="form-control" value="{{ $car->PRICE }}" readonly>
                        </div>

                        <!-- Total Price -->
                        <div class="form-group mb-3">
                            <label for="TOTAL_PRICE" class="form-label">Total Price</label>
                            <input type="number" name="TOTAL_PRICE" id="TOTAL_PRICE" class="form-control" readonly>
                        </div>

                        <!-- Booking Status -->
                        <div class="form-group mb-3">
                            <label for="BOOK_STATUS" class="form-label">Booking Status</label>
                            <input type="text" name="BOOK_STATUS" class="form-control" value="UNDER PROCESSING" readonly>
                        </div>

                        <!-- Return Date -->
                        <div class="form-group mb-3">
                            <label for="RETURN_DATE" class="form-label">Return Date</label>
                            <input type="date" id="RETURN_DATE" name="RETURN_DATE" class="form-control" value="{{ old('RETURN_DATE') }}" readonly>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4">Confirm Booking</button>
                        </div>

                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bookingDate = document.getElementById('BOOK_DATE');
        const duration = document.getElementById('DURATION');
        const returnDate = document.getElementById('RETURN_DATE');
        const priceInput = document.getElementById('PRICE');
        const totalPriceInput = document.getElementById('TOTAL_PRICE');
        
        // Get car price from the backend
        const carPricePerDay = @json($car->price); 

        function calculateReturnDate() {
            const bookingDateValue = bookingDate.value;
            const durationValue = parseInt(duration.value);

            if (bookingDateValue && durationValue > 0) {
                const startDate = new Date(bookingDateValue);
                startDate.setDate(startDate.getDate() + durationValue); // Adding duration to booking date

                const formattedReturnDate = startDate.toISOString().split('T')[0];
                returnDate.value = formattedReturnDate;
            } else {
                returnDate.value = ''; // Reset if duration is invalid
            }
        }

        function updatePrice() {
            const durationValue = parseInt(duration.value);

            if (durationValue > 0) {
                const totalPrice = carPricePerDay * durationValue;
                totalPriceInput.value = totalPrice; // Update the total price field
            } else {
                totalPriceInput.value = 0;
            }
        }

        // Event listeners
        bookingDate.addEventListener('change', function () {
            calculateReturnDate();
            updatePrice();
        });
        
        duration.addEventListener('input', function () {
            calculateReturnDate();
            // updatePrice();
            const durationValue = parseInt(duration.value);
            totalPriceInput.value = durationValue * parseFloat(priceInput.value);
        });

        // Initial price and return date calculation if duration is pre-filled
        updatePrice();
    });
</script>
@endsection
@endsection
