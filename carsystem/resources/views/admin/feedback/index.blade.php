@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>User Feedback</h1>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User Email</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->FEEDBACK_ID }}</td>
                    <td>{{ $feedback->EMAIL }}</td>
                    <td>{{ $feedback->MESSAGE }}</td>
                    <td>{{ $feedback->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>
                        <form action="{{ route('admin.feedbacks.destroy', $feedback->FEEDBACK_ID) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No feedback available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
