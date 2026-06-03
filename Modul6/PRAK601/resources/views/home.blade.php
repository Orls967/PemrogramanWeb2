@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
  <div class="row gx-4 gy-4">
    <div class="col-lg-8">
      <div class="glass-card p-4 hero fade-in">
        <div class="d-flex hero align-items-center">
          <div class="profile-wrap me-4">
            <div class="profile-glow"></div>
            <img src="{{ asset($praktikan['photo']) }}" alt="{{ $praktikan['full_name'] }}" class="profile-img">
          </div>
          <div class="flex-1">
            <h1>{{ $praktikan['full_name'] }}</h1>
            <div class="sub">NIM <strong>{{ $praktikan['nim'] }}</strong> · {{ $praktikan['prodi'] }}</div>
            <p class="mb-3">Praktikan pada mata praktikum Pemrograman Web II. Halaman ini menampilkan data sederhana yang disimpan di model tanpa database. Berfokus pada pengembangan solusi digital yang inovatif dan estetik.</p>
            <a href="/profile" class="btn btn-gradient">Lihat Profil</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="glass-card p-3 fade-in">
        <h5 class="mb-3">Ringkasan</h5>
        <ul class="list-unstyled mb-0">
          <li class="mb-2"><strong>Nama:</strong> {{ $praktikan['full_name'] }}</li>
          <li class="mb-2"><strong>NIM:</strong> {{ $praktikan['nim'] }}</li>
          <li class="mb-2"><strong>Program Studi:</strong> {{ $praktikan['prodi'] }}</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="row mt-4 gx-3 gy-3">
    <div class="col-lg-4">
      <div class="glass-card p-3 fade-in">
        <h6 class="mb-3">Skills</h6>
        <div>
          @foreach($praktikan['skills'] as $s)
            <span class="skill-pill">{{ $s }}</span>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-lg-8">
      <div class="glass-card p-3 fade-in">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Pengalaman Terbaru</h5>
          <a href="#experiences" class="text-muted small">Lihat Semua</a>
        </div>
        <div class="row g-3">
          @foreach($cards as $card)
            <x-experience-card :card="$card" :desc-length="100" />
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection