@extends('layouts.app')

@section('title', 'Profile')
@section('topbar-title', 'PROFILE')

@section('content')
    <div class="page-header">
        <div>
            <div class="breadcrumb">
                <span>Dashboard</span>
                <span>/</span>
                <span class="current">Profile</span>
            </div>
            <h2>Profil Administrator</h2>
            <p>Informasi akun pengelola sistem perpustakaan.</p>
        </div>
    </div>

    <div class="profile-container">
        <div class="glass-card profile-card">
            <div class="profile-avatar-section">
                <div class="profile-avatar-large">
                    <span class="material-symbols-outlined">admin_panel_settings</span>
                </div>
                <h3 class="profile-name">{{ $user->username }}</h3>
                <span class="badge badge-success">Aktif</span>
            </div>

            <div class="profile-divider"></div>

            <div class="profile-info">
                <div class="profile-info-item">
                    <div class="profile-info-icon">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div class="profile-info-content">
                        <span class="profile-info-label">Nama User</span>
                        <p class="profile-info-value">{{ $user->username }}</p>
                    </div>
                </div>

                <div class="profile-info-item">
                    <div class="profile-info-icon">
                        <span class="material-symbols-outlined">badge</span>
                    </div>
                    <div class="profile-info-content">
                        <span class="profile-info-label">Username</span>
                        <p class="profile-info-value">{{ $user->username }}</p>
                    </div>
                </div>

                <div class="profile-info-item">
                    <div class="profile-info-icon">
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <div class="profile-info-content">
                        <span class="profile-info-label">Email</span>
                        <p class="profile-info-value">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="profile-info-item">
                    <div class="profile-info-icon">
                        <span class="material-symbols-outlined">shield_person</span>
                    </div>
                    <div class="profile-info-content">
                        <span class="profile-info-label">Role</span>
                        <p class="profile-info-value">Administrator</p>
                    </div>
                </div>

                <div class="profile-info-item">
                    <div class="profile-info-icon">
                        <span class="material-symbols-outlined">work</span>
                    </div>
                    <div class="profile-info-content">
                        <span class="profile-info-label">Tugas</span>
                        <p class="profile-info-value">Bos Admin PRAK701</p>
                    </div>
                </div>

                <div class="profile-info-item">
                    <div class="profile-info-icon">
                        <span class="material-symbols-outlined">verified</span>
                    </div>
                    <div class="profile-info-content">
                        <span class="profile-info-label">Status</span>
                        <p class="profile-info-value" style="color: var(--color-success); font-weight: 700;">● Aktif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection