@extends('layouts.app')

@section('title', 'Data Peminjaman')
@section('topbar-title', 'MANAJEMEN PEMINJAMAN')

@section('content')
    <div class="page-header">
        <div>
            <div class="breadcrumb">
                <span>Dashboard</span>
                <span>/</span>
                <span class="current">Peminjaman</span>
            </div>
            <h2>Data Peminjaman</h2>
            <p>Kelola seluruh transaksi peminjaman buku perpustakaan.</p>
        </div>
        <a href="{{ route('loans.create') }}" class="btn btn-primary">
            <span class="material-symbols-outlined">add</span>
            Tambah Peminjaman
        </a>
    </div>

    <div class="glass-card table-container">
        <div class="table-header">
            <h4>Data Peminjaman</h4>
            <span class="table-info">Menampilkan {{ $loans->count() }} peminjaman</span>
        </div>

        <div style="overflow-x: auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Member</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($loans as $loan)
                        <tr>
                            <td class="text-mono">#P{{ str_pad($loan->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>
                                <div class="member-cell">
                                    <div class="member-avatar">
                                        {{ strtoupper(substr($loan->member->nama_member, 0, 2)) }}
                                    </div>
                                    <span style="font-weight: 600;">{{ $loan->member->nama_member }}</span>
                                </div>
                            </td>
                            <td>{{ $loan->book->judul }}</td>
                            <td class="text-muted">{{ \Carbon\Carbon::parse($loan->tanggal_pinjam)->format('d M Y') }}</td>
                            <td class="text-muted">{{ \Carbon\Carbon::parse($loan->tanggal_kembali)->format('d M Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('loans.edit', $loan) }}" class="btn-action edit" title="Edit">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                    <form action="{{ route('loans.destroy', $loan) }}" method="POST" class="delete-form"
                                        onsubmit="return confirm('Hapus peminjaman ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action delete" title="Hapus">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <span class="material-symbols-outlined">handshake</span>
                                    <p>Belum ada data peminjaman</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection