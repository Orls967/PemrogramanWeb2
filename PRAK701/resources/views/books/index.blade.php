@extends('layouts.app')

@section('title', 'Data Buku')
@section('topbar-title', 'MANAJEMEN KOLEKSI')

@section('content')
    <div class="page-header">
        <div>
            <div class="breadcrumb">
                <span>Dashboard</span>
                <span>/</span>
                <span class="current">Buku</span>
            </div>
            <h2>Daftar Koleksi Buku</h2>
            <p>Kelola seluruh aset literasi perpustakaan dalam satu dashboard terintegrasi.</p>
        </div>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <span class="material-symbols-outlined">add</span>
            Tambah Buku
        </a>
    </div>

    <div class="glass-card table-container">
        <div class="table-header">
            <h4>Data Buku</h4>
            <span class="table-info">Menampilkan {{ $books->count() }} buku</span>
        </div>

        <div style="overflow-x: auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td class="text-mono">#B{{ str_pad($book->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td style="font-weight: 600;">{{ $book->judul }}</td>
                            <td>{{ $book->penulis }}</td>
                            <td class="text-muted">{{ $book->penerbit }}</td>
                            <td class="text-muted">{{ $book->tahun_terbit }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('books.edit', $book) }}" class="btn-action edit" title="Edit">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="delete-form"
                                        onsubmit="return confirm('Hapus buku ini?')">
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
                                    <span class="material-symbols-outlined">menu_book</span>
                                    <p>Belum ada data buku</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection