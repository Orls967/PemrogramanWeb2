@extends('layouts.app')

@section('title', 'Tambah Member')
@section('topbar-title', 'TAMBAH MEMBER')

@section('content')
    <div class="page-header">
        <div>
            <div class="breadcrumb">
                <span>Dashboard</span>
                <span>/</span>
                <span>Member</span>
                <span>/</span>
                <span class="current">Tambah</span>
            </div>
            <h2>Tambah Member Baru</h2>
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

        <form method="POST" action="{{ route('members.store') }}">
            @csrf

            <div class="form-group">
                <label for="nama_member">Nama Member</label>
                <input type="text" id="nama_member" name="nama_member" class="form-control"
                    placeholder="Masukkan nama member" value="{{ old('nama_member') }}">
            </div>

            <div class="form-group">
                <label for="nomor_member">Nomor Member</label>
                <input type="text" id="nomor_member" name="nomor_member" class="form-control"
                    placeholder="Contoh: MBR011" value="{{ old('nomor_member') }}">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control"
                    placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="tgl_mendaftar">Tanggal Mendaftar</label>
                <input type="datetime-local" id="tgl_mendaftar" name="tgl_mendaftar" class="form-control"
                    value="{{ old('tgl_mendaftar') }}">
            </div>

            <div class="form-group">
                <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar</label>
                <input type="date" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" class="form-control"
                    value="{{ old('tgl_terakhir_bayar') }}">
            </div>

            <div class="form-actions">
                <a href="{{ route('members.index') }}" class="btn btn-secondary">
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