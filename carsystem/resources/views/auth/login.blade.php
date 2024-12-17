@extends('layouts.main')

@section('content')
<div class="container mt-5">
    {{-- Display success message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Display error message --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Login text above form -->
    <div class="text-center mb-4">
        <h2>Login</h2>
    </div>

    <!-- Two-column form layout -->
    <form action="{{ route('login') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-12">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword" style="border-radius: 0 0.25rem 0.25rem 0;">
                        <i class="bi bi-eye-slash" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-custom w-100">Login</button>
        </div>
    </form>

    <!-- Link for creating an account -->
    <div class="text-center mt-3">
        <p>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Create an account</a></p>
    </div>
</div>
@endsection
