@extends('layout')

@section('title', 'Admin Dashboard')

@section('content')
<h1>Admin Dashboard</h1>
<nav>
    <a href="/admin/cars">Manage Cars</a>
    <a href="/admin/users">Manage Users</a>
    <a href="/admin/bookings">Manage Bookings</a>
    <a href="/admin/feedbacks">View Feedbacks</a>
</nav>
@endsection
