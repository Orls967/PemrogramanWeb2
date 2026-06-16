@extends('layouts.guest')

@section('content')
<div class="login-wrapper">
    <div class="login-logo">
        <h2>Sistem Informasi</h2>
        <span>Perpustakaan</span>
    </div>

    <div class="glass-card login-card">
        <h1>Sign In</h1>
        <p class="subtitle">Masuk untuk mengelola sistem perpustakaan.</p>

        @if($errors->any())
            <div class="alert alert-danger">
                <span class="material-symbols-outlined">error</span>
                {{ $errors->first('login') ?: $errors->first() }}
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning">
                <span class="material-symbols-outlined">warning</span>
                {{ session('warning') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            <div class="form-group">
                <label for="login">Username atau Email</label>
                <input
                    type="text"
                    id="login"
                    name="login"
                    class="form-control"
                    placeholder="Masukkan username atau email"
                    value="{{ old('login') }}"
                    autofocus
                    required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required>
            </div>

            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 24px;">
                <input type="checkbox" id="remember" name="remember"
                    style="width: 16px; height: 16px; accent-color: var(--color-primary);">
                <label for="remember" style="font-size: 14px; color: var(--text-on-surface-variant); cursor: pointer; margin: 0;">
                    Remember me
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 16px; font-size: 16px;">
                Login
            </button>
        </form>

        <div style="margin-top: 32px; text-align: center;">
            <p style="font-size: 13px; color: var(--text-on-surface-variant);">
                Default: admin / admin123
            </p>
        </div>
    </div>
</div>
@endsection