@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">MY BOOKS</h1>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Car</th>
                <th>Book Place</th>
                <th>Booking Date</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->BOOK_ID }}</td>
                    <td>{{ $booking->car->CAR_NAME ?? 'N/A' }}</td>
                    <td>{{ $booking->BOOK_PLACE }}</td>
                    <td>{{ $booking->BOOK_DATE }}</td>
                    <td>{{ $booking->DURATION }} days</td>
                    <td>₱{{ $booking->TOTAL_PRICE }}</td>
                    <td>{{ $booking->BOOK_STATUS }}</td>
                    <td>
                        <a href="{{ route('admin.bookings.edit', $booking->BOOK_ID) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking->BOOK_ID) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
