<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Perpustakaan - Dashboard Admin">
    <title>@yield('title', 'Dashboard') - Sistem Informasi Perpustakaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="app-wrapper">
        <aside class="sidebar">
            <div class="sidebar-brand">
                <h2>Sistem Informasi</h2>
                <span>Perpustakaan</span>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    Dashboard
                </a>
                <a href="{{ route('books.index') }}" class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">menu_book</span>
                    Buku
                </a>
                <a href="{{ route('members.index') }}" class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">group</span>
                    Member
                </a>
                <a href="{{ route('loans.index') }}" class="nav-link {{ request()->routeIs('loans.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">handshake</span>
                    Peminjaman
                </a>
                <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">person</span>
                    Profile
                </a>
            </nav>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <span class="material-symbols-outlined">logout</span>
                        Logout
                    </button>
                </form>

                <a href="{{ route('profile') }}" class="sidebar-user" style="text-decoration: none;">
                    <div class="avatar">
                        {{ strtoupper(substr(Auth::user()->username, 0, 2)) }}
                    </div>
                    <div class="user-info">
                        <p>{{ Auth::user()->username }}</p>
                        <span>Administrator</span>
                    </div>
                </a>
            </div>
        </aside>

        <div class="main-content">
            <header class="topbar">
                <span class="topbar-title">@yield('topbar-title', 'Dashboard')</span>
                <a href="{{ route('profile') }}" class="topbar-user" style="text-decoration: none;">
                    <div class="user-name">
                        <p>{{ Auth::user()->username }}</p>
                        <span>Administrator</span>
                    </div>
                    <div class="avatar">
                        {{ strtoupper(substr(Auth::user()->username, 0, 2)) }}
                    </div>
                </a>
            </header>

            <main class="page-content">
                @if(session('success'))
                    <div class="alert alert-success">
                        <span class="material-symbols-outlined">check_circle</span>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('warning'))
                    <div class="alert alert-warning">
                        <span class="material-symbols-outlined">warning</span>
                        {{ session('warning') }}
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="app-footer">
                <p>&copy; {{ date('Y') }} Sistem Informasi Perpustakaan. All Rights Reserved.</p>
                <p>PRAK701 — Modul 7</p>
            </footer>
        </div>
    </div>

    <div class="glow-top-left"></div>
    <div class="glow-bottom-right"></div>

    @yield('scripts')
</body>
</html>