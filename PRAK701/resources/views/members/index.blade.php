@extends('layouts.app')

@section('title', 'Data Member')
@section('topbar-title', 'MANAJEMEN MEMBER')

@section('content')
    <div class="page-header">
        <div>
            <div class="breadcrumb">
                <span>Dashboard</span>
                <span>/</span>
                <span class="current">Member</span>
            </div>
            <h2>Data Member</h2>
            <p>Kelola seluruh data anggota perpustakaan yang terdaftar.</p>
        </div>
        <a href="{{ route('members.create') }}" class="btn btn-primary">
            <span class="material-symbols-outlined">person_add</span>
            Tambah Member
        </a>
    </div>

    <div class="glass-card table-container">
        <div class="table-header">
            <h4>Data Member</h4>
            <span class="table-info">Menampilkan {{ $members->count() }} member</span>
        </div>

        <div style="overflow-x: auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Member</th>
                        <th>Nomor Member</th>
                        <th>Alamat</th>
                        <th>Tgl Mendaftar</th>
                        <th>Tgl Terakhir Bayar</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                        <tr>
                            <td class="text-mono">#M{{ str_pad($member->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td style="font-weight: 600;">{{ $member->nama_member }}</td>
                            <td>{{ $member->nomor_member }}</td>
                            <td class="text-muted">{{ Str::limit($member->alamat, 30) }}</td>
                            <td class="text-muted">{{ \Carbon\Carbon::parse($member->tgl_mendaftar)->format('d M Y') }}</td>
                            <td class="text-muted">{{ \Carbon\Carbon::parse($member->tgl_terakhir_bayar)->format('d M Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('members.edit', $member) }}" class="btn-action edit" title="Edit">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                    <form action="{{ route('members.destroy', $member) }}" method="POST" class="delete-form"
                                        onsubmit="return confirm('Hapus member ini?')">
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
                            <td colspan="7">
                                <div class="empty-state">
                                    <span class="material-symbols-outlined">group</span>
                                    <p>Belum ada data member</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection