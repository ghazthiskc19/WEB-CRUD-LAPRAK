@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
    <section class="hero-card" style="margin-bottom: 18px;">
        <div>
            <span class="eyebrow">Admin Access</span>
            <h1 class="page-title">Login Admin</h1>
            <p class="page-subtitle">
                Masuk menggunakan akun admin untuk mengelola informasi.
            </p>
        </div>

        <div class="hero-actions">
            <a href="{{ route('home') }}" class="btn btn-ghost">Kembali ke Home</a>
        </div>
    </section>

    @include('partials.flash')

    <section class="auth-layout">
        <div class="auth-card">
            <form method="POST" action="{{ route('login') }}" class="stack">
                @csrf

                <div class="field-group">
                    <label for="username" class="field-label">Username</label>
                    <input
                        type="text"
                        class="field-input"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        autocomplete="username"
                        required
                    >
                    @error('username')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field-group">
                    <label for="email" class="field-label">Email</label>
                    <input
                        type="email"
                        class="field-input"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >
                    @error('email')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field-group">
                    <label for="password" class="field-label">Password</label>
                    <input
                        type="password"
                        class="field-input"
                        id="password"
                        name="password"
                        autocomplete="current-password"
                        required
                    >
                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="button-row">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>

                <p class="footer-note">
                    Gunakan akun admin yang sudah di-seed untuk testing: admin1@test.com atau admin2@test.com dengan password 123.
                </p>
            </form>
        </div>
    </section>
@endsection