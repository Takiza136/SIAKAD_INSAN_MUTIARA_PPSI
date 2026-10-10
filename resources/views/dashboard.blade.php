@extends('layouts.auth')

@section('title', 'Dashboard')

@section('content')
<section class="auth-card" aria-labelledby="dash-title" style="max-width: 420px">
    @if (session('login_success'))
        <div class="alert alert--success" role="status">
            <p class="alert__title">{{ session('login_success')['title'] }}</p>
            <p class="alert__text">{{ session('login_success')['message'] }}</p>
        </div>
    @endif

    <h1 class="auth-title" id="dash-title">Halo, {{ auth()->user()->name }}</h1>
    <p class="auth-subtitle">Peran: {{ str_replace('_', ' ', ucfirst(auth()->user()->role)) }}. Dashboard akan dibuat pada tahap UI berikutnya.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn" type="submit" id="btn-logout">Keluar</button>
    </form>
</section>
@endsection
