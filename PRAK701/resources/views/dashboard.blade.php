@extends('layouts.app')

@section('title', 'Dashboard')
@section('topbar-title', 'DASHBOARD')

@section('content')
    <section class="hero-welcome">
        <h1>Selamat Datang, {{ Auth::user()->username }}!</h1>
        <p>Pantau sirkulasi literasi dan kelola aset pustaka digital Anda dengan presisi tinggi melalui dashboard eksekutif ini.</p>
    </section>

    <section class="stats-grid">
        <div class="glass-card stat-card">
            <div class="stat-icon">
                <span class="material-symbols-outlined">library_books</span>
            </div>
            <p class="stat-label">Total Koleksi Buku</p>
            <h3 class="stat-value">{{ number_format($totalBooks) }}</h3>
        </div>

        <div class="glass-card stat-card">
            <div class="stat-icon">
                <span class="material-symbols-outlined">group</span>
            </div>
            <p class="stat-label">Total Member Aktif</p>
            <h3 class="stat-value">{{ number_format($totalMembers) }}</h3>
        </div>

        <div class="glass-card stat-card">
            <div class="stat-icon">
                <span class="material-symbols-outlined">swap_horiz</span>
            </div>
            <p class="stat-label">Total Peminjaman</p>
            <h3 class="stat-value">{{ number_format($totalLoans) }}</h3>
        </div>
    </section>

    <div class="glass-card table-container">
        <div class="table-header">
            <h4>Aktivitas Terbaru</h4>
            <a href="{{ route('loans.index') }}" class="btn btn-sm btn-secondary">Lihat Semua</a>
        </div>

        <table class="data-table activity-table">
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentLoans as $loan)
                    <tr>
                        <td>
                            <div class="member-cell">
                                <div class="member-avatar">
                                    {{ strtoupper(substr($loan->member->nama_member, 0, 2)) }}
                                </div>
                                <span>{{ $loan->member->nama_member }}</span>
                            </div>
                        </td>
                        <td>{{ $loan->book->judul }}</td>
                        <td class="text-muted">{{ $loan->tanggal_pinjam }}</td>
                        <td class="text-muted">{{ $loan->tanggal_kembali }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">
                            <span class="material-symbols-outlined">inbox</span>
                            <p>Belum ada aktivitas peminjaman</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-top: 32px;">
        <a href="{{ route('books.create') }}" class="glass-card" style="padding: 24px; text-align: center; text-decoration: none; transition: all 0.3s;">
            <span class="material-symbols-outlined" style="font-size: 28px; color: var(--color-primary); margin-bottom: 8px; display: block;">add_circle</span>
            <span style="font-size: 13px; font-weight: 700; color: var(--text-on-surface);">Input Buku</span>
        </a>
        <a href="{{ route('members.create') }}" class="glass-card" style="padding: 24px; text-align: center; text-decoration: none; transition: all 0.3s;">
            <span class="material-symbols-outlined" style="font-size: 28px; color: var(--color-primary); margin-bottom: 8px; display: block;">person_add</span>
            <span style="font-size: 13px; font-weight: 700; color: var(--text-on-surface);">Daftar Member</span>
        </a>
        <a href="{{ route('loans.create') }}" class="glass-card" style="padding: 24px; text-align: center; text-decoration: none; transition: all 0.3s;">
            <span class="material-symbols-outlined" style="font-size: 28px; color: var(--color-primary); margin-bottom: 8px; display: block;">assignment</span>
            <span style="font-size: 13px; font-weight: 700; color: var(--text-on-surface);">Pinjam Buku</span>
        </a>
        <a href="{{ route('loans.index') }}" class="glass-card" style="padding: 24px; text-align: center; text-decoration: none; transition: all 0.3s;">
            <span class="material-symbols-outlined" style="font-size: 28px; color: var(--color-primary); margin-bottom: 8px; display: block;">description</span>
            <span style="font-size: 13px; font-weight: 700; color: var(--text-on-surface);">Laporan</span>
        </a>
    </div>
@endsection