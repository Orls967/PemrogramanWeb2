@extends('layouts.app')

@section('title', 'Edit Buku')
@section('topbar-title', 'EDIT BUKU')

@section('content')
    <div class="page-header">
        <div>
            <div class="breadcrumb">
                <span>Dashboard</span>
                <span>/</span>
                <span>Buku</span>
                <span>/</span>
                <span class="current">Edit</span>
            </div>
            <h2>Edit Buku</h2>
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

        <form method="POST" action="{{ route('books.update', $book) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" id="judul" name="judul" class="form-control"
                    value="{{ old('judul', $book->judul) }}">
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis" class="form-control"
                    value="{{ old('penulis', $book->penulis) }}">
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" class="form-control"
                    value="{{ old('penerbit', $book->penerbit) }}">
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="text" id="tahun_terbit" name="tahun_terbit" class="form-control"
                    value="{{ old('tahun_terbit', $book->tahun_terbit) }}">
            </div>

            <div class="form-actions">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">
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