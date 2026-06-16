@extends('layouts.app')

@section('title', 'Edit Peminjaman')
@section('topbar-title', 'EDIT PEMINJAMAN')

@section('content')
    <div class="page-header">
        <div>
            <div class="breadcrumb">
                <span>Dashboard</span>
                <span>/</span>
                <span>Peminjaman</span>
                <span>/</span>
                <span class="current">Edit</span>
            </div>
            <h2>Edit Peminjaman</h2>
        </div>
    </div>

    <div class="glass-card form-card">
        @if($errors->any())
            <div class="validation-errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('loans.update', $loan) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="member_id">Member</label>
                <select id="member_id" name="member_id" class="form-control">
                    <option value="">-- Pilih Member --</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id', $loan->member_id) == $member->id ? 'selected' : '' }}>
                            {{ $member->nama_member }} ({{ $member->nomor_member }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="book_id">Buku</label>
                <select id="book_id" name="book_id" class="form-control">
                    <option value="">-- Pilih Buku --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id', $loan->book_id) == $book->id ? 'selected' : '' }}>
                            {{ $book->judul }} — {{ $book->penulis }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control"
                    value="{{ old('tanggal_pinjam', $loan->tanggal_pinjam) }}">
            </div>

            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control"
                    value="{{ old('tanggal_kembali', $loan->tanggal_kembali) }}">
            </div>

            <div class="form-actions">
                <a href="{{ route('loans.index') }}" class="btn btn-secondary">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection