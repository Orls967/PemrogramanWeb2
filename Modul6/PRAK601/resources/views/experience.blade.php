@extends('layouts.app')

@section('title', $experience['title'] ?? 'Detail Pengalaman')

@section('content')
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="glass-card fade-in">
        <img src="{{ asset($experience['image']) }}" class="experience-hero" alt="{{ $experience['title'] }}">
        <div class="p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">{{ $experience['title'] }}</h2>
            <span class="badge" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.04);color:rgba(230,238,248,0.9);">{{ $experience['time'] }}</span>
          </div>

          <h6>Deskripsi</h6>
          <p class="mb-3">{{ $experience['description'] }}</p>

          <h6>Kesan</h6>
          <p class="mb-4">{{ $experience['impression'] }}</p>

          <a href="/profile" class="btn btn-gradient">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection