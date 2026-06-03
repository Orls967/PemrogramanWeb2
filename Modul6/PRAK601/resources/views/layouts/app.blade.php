<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PRAK601')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="glow-blob g1"></div>
    <div class="glow-blob g2"></div>
    <div class="glow-blob g3"></div>

    <nav class="navbar navbar-expand-lg position-fixed w-100" style="top:18px;left:0;right:0;z-index:999">
      <div class="container main-container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
          <a class="brand" href="/">PRAK601</a>
        </div>

        <div class="nav-center">
          @if(request()->is('/'))
            <span class="nav-link active" aria-current="page">Beranda</span>
          @else
            <a class="nav-link" href="/">Beranda</a>
          @endif

          @if(request()->is('profile'))
            <span class="nav-link active" aria-current="page">Profil</span>
          @else
            <a class="nav-link" href="/profile">Profil</a>
          @endif
        </div>

        <div></div>
      </div>
    </nav>

    <div class="container page-container my-5">
      @yield('content')
    </div>

    <footer class="mt-5 py-4 bg-white border-top">
      <div class="container main-container text-center text-muted small">
        &copy; {{ date('Y') }} PRAK601 — Praktikum Pemrograman Web II
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function(){
        document.querySelectorAll('.fade-in').forEach((el,i)=>{
          setTimeout(()=>el.classList.add('visible'), 120 + i*80);
        });
        const blobs = document.querySelectorAll('.glow-blob');
        document.addEventListener('mousemove', (e)=>{
          const cx = window.innerWidth/2, cy = window.innerHeight/2;
          blobs.forEach((b, idx)=>{
            const rx = (e.clientX - cx) * (0.02 * (idx+1));
            const ry = (e.clientY - cy) * (0.02 * (idx+1));
            b.style.transform = `translate(${rx}px, ${ry}px)`;
          });
        });
        function updateNavbarSpace(){
          const nav = document.querySelector('.navbar');
          if(!nav) return;
          const offset = (nav.offsetTop || 0) + nav.offsetHeight + 12;
          document.documentElement.style.setProperty('--navbar-space', offset + 'px');
        }
        updateNavbarSpace();
        window.addEventListener('resize', updateNavbarSpace);
      });
    </script>
  </body>
</html>