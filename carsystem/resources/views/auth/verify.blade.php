@extends('layouts.main')

@section('title', 'Verify Your Email Address')
@section('header-title', 'Verify Your')
@section('header-subtitle', 'Email Address')
@section('header-description', 'Please check your email inbox for a verification link to complete the registration process.')

@section('content')
<div class="text-center">
    <h2>{{ __('Verify Your Email Address') }}</h2>

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
    <p>{{ __('If you did not receive the email') }},</p>

    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-custom">{{ __('Click here to request another') }}</button>
    </form>
</div>
@endsection
