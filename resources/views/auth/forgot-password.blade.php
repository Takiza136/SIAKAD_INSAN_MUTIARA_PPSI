@extends('layouts.auth')

@section('title', 'Lupa password')

@section('content')
<section class="auth-card" aria-labelledby="forgot-title">
    <div class="badge-icon" aria-hidden="true">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="15" r="4"/><path d="M10.8 12.2 20 3M16 7l3 3M14 9l2 2"/></svg>
    </div>

    <h1 class="auth-title" id="forgot-title">Lupa password?</h1>
    <p class="auth-subtitle">Hubungi administrator tata usaha sekolah untuk meminta reset password akun E-Rapor Anda.</p>

    <div class="info-box">
        <p class="info-box__title">Bantuan dari tata usaha</p>
        <p class="info-box__text">Sampaikan nama dan username akun Anda kepada administrator. Setelah password direset, gunakan password yang diberikan sekolah untuk masuk kembali.</p>
    </div>

    <a class="btn" href="{{ route('login') }}" id="btn-back-login">Kembali ke login</a>

    <p class="auth-note">Jaga kerahasiaan password akun Anda.</p>
</section>
@endsection
