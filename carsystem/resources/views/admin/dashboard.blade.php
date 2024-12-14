<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    <p>Total Cars: {{ $carCount }}</p>
    <p>Total Users: {{ $userCount }}</p>
    <p>Total Bookings: {{ $bookingCount }}</p>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
