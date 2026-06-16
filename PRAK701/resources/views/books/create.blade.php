@extends('layouts.app')

@section('title', 'Tambah Buku')
@section('topbar-title', 'TAMBAH BUKU')

@section('content')
    <div class="page-header">
        <div>
            <div class="breadcrumb">
                <span>Dashboard</span>
                <span>/</span>
                <span>Buku</span>
                <span>/</span>
                <span class="current">Tambah</span>
            </div>
            <h2>Tambah Buku Baru</h2>
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

        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" id="judul" name="judul" class="form-control"
                    placeholder="Masukkan judul buku" value="{{ old('judul') }}">
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis" class="form-control"
                    placeholder="Masukkan nama penulis" value="{{ old('penulis') }}">
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" class="form-control"
                    placeholder="Masukkan nama penerbit" value="{{ old('penerbit') }}">
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="text" id="tahun_terbit" name="tahun_terbit" class="form-control"
                    placeholder="Contoh: 2023" value="{{ old('tahun_terbit') }}">
            </div>

            <div class="form-actions">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection