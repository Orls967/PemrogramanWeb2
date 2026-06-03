@extends('layouts.app')

@section('title', 'Profil')

@section('content')
  <div class="row gx-4 gy-4">
    <aside class="col-lg-4">
      <div class="glass-card p-4 text-center fade-in">
        <div class="profile-wrap mb-3">
          <div class="profile-glow"></div>
          <img src="{{ asset($praktikan['photo']) }}" alt="{{ $praktikan['full_name'] }}" class="profile-img mx-auto">
        </div>
        <h3 class="mb-1">{{ $praktikan['full_name'] }}</h3>
        <div class="mb-1">{{ $praktikan['prodi'] }}</div>
        <p class="mb-3"><strong>NIM:</strong> {{ $praktikan['nim'] }}</p>
        <div class="d-grid gap-2">
          <a href="/" class="btn btn-gradient">Kembali</a>
        </div>
      </div>

      <div class="glass-card p-3 mt-3 fade-in">
        <h6 class="mb-3">Skills</h6>
        <div>
          @foreach($praktikan['skills'] as $s)
            <span class="skill-pill">{{ $s }}</span>
          @endforeach
        </div>
      </div>

      <div class="glass-card p-3 mt-3 fade-in">
        <h6 class="mb-3">Hobi</h6>
        <ul class="mb-0">
          @foreach($praktikan['hobi'] as $h)
            <li>{{ $h }}</li>
          @endforeach
        </ul>
      </div>
    </aside>

    <main class="col-lg-8">
      <div class="row g-3">
        @foreach($cards as $card)
          <x-experience-card :card="$card" :desc-length="100" />
        @endforeach
      </div>
    </main>
  </div>
@endsection
