@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>All Bookings</h1>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Car</th>
                <th>User Email</th>
                <th>Book Place</th>
                <th>Booking Date</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->BOOK_ID }}</td>
                    <td>{{ $booking->car->CAR_NAME ?? 'N/A' }}</td>
                    <td>{{ $booking->EMAIL }}</td>
                    <td>{{ $booking->BOOK_PLACE }}</td>
                    <td>{{ $booking->BOOK_DATE }}</td>
                    <td>{{ $booking->DURATION }} days</td>
                    <td>{{ $booking->BOOK_STATUS }}</td>
                    <td>
                        <a href="{{ route('admin.bookings.edit', $booking->BOOK_ID) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking->BOOK_ID) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No bookings available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
