@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<section class="auth-card" aria-labelledby="login-title">
    <h1 class="auth-title" id="login-title">Selamat datang</h1>
    <p class="auth-subtitle">Masuk dengan akun yang diberikan sekolah.</p>

    @if (session('login_error'))
        <div class="alert alert--danger" role="alert" id="login-alert-error">
            <svg class="alert__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16.5v.01"/></svg>
            <div>
                <p class="alert__title">{{ session('login_error')['title'] }}</p>
                <p class="alert__text">{{ session('login_error')['message'] }}</p>
            </div>
        </div>
    @endif

    @if (session('login_success'))
        <div class="alert alert--success" role="status" id="login-alert-success">
            <p class="alert__title">{{ session('login_success')['title'] }}</p>
            <p class="alert__text">{{ session('login_success')['message'] }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" novalidate id="login-form">
        @csrf

        <div class="field">
            <label class="field__label" for="username">Username</label>
            <input class="field__input @error('username') is-invalid @enderror" type="text" id="username" name="username"
                   value="{{ old('username') }}" placeholder="Masukkan username" autocomplete="username" autofocus required>
            @error('username')
                <p class="field__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="password">Password</label>
            <div class="field__password">
                <input class="field__input @error('password') is-invalid @enderror" type="password" id="password" name="password"
                       placeholder="Masukkan password" autocomplete="current-password" required>
                <button class="field__toggle" type="button" id="toggle-password" aria-label="Tampilkan password" aria-pressed="false">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            @error('password')
                <p class="field__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-row">
            <label class="check" for="remember">
                <input type="checkbox" id="remember" name="remember" value="1" @checked(old('remember'))>
                Ingat username saya
            </label>
            <a class="link" href="{{ route('password.request') }}" id="link-forgot-password">Lupa password?</a>
        </div>

        <button class="btn" type="submit" id="btn-login">
            Masuk ke E-Rapor <span class="btn__arrow" aria-hidden="true">&rarr;</span>
        </button>
    </form>

    <p class="auth-note">Akses untuk <strong>Admin</strong>, <strong>Wali Kelas</strong>, dan <strong>Kepala Sekolah</strong>.</p>
</section>
@endsection

@section('footer')
    <p>Kesulitan masuk? Hubungi administrator di tata usaha sekolah.</p>
@endsection
