@extends('layouts.app')

@section('title', auth()->check() ? 'Dashboard Admin' : 'Beranda Guest')

@section('content')
    <section class="hero-card">
        <div>
            <span class="eyebrow">WEB CRUD Dashboard</span>
            <h1 class="page-title">
                {{ auth()->check() ? 'Halo, ' . Auth::user()->username : 'Informasi publik untuk guest' }}
            </h1>
            <p class="page-subtitle">
                {{ auth()->check()
                    ? 'Kelola data informasi dengan tampilan yang lebih rapi, responsif, dan nyaman dipakai saat user testing.'
                    : 'Guest hanya bisa membaca informasi yang sudah dipublikasikan. Login untuk mengelola data.' }}
            </p>
        </div>

        <div class="hero-actions">
            @auth
                <a href="{{ route('info.form') }}" class="btn btn-primary">Tambah Informasi</a>
                <a href="{{ route('logout') }}" class="btn btn-ghost">Logout</a>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-primary">Login Admin</a>
            @endguest
        </div>
    </section>

    @include('partials.flash')

    @auth
        <section class="grid" aria-label="Ringkasan admin">
            <article class="panel" style="grid-column: span 4;">
                <div class="metric">
                    <span class="metric-label">Total informasi</span>
                    <p class="metric-value">{{ $all_information->count() }}</p>
                    <p class="metric-note">Data aktif yang tersimpan di database.</p>
                </div>
            </article>
            <article class="panel" style="grid-column: span 4;">
                <div class="metric">
                    <span class="metric-label">Status login</span>
                    <p class="metric-value">Aktif</p>
                    <p class="metric-note">Akses admin terbuka untuk create, edit, dan delete.</p>
                </div>
            </article>
            <article class="panel" style="grid-column: span 4;">
                <div class="metric">
                    <span class="metric-label">Mode tampilan</span>
                    <p class="metric-value">Responsive</p>
                    <p class="metric-note">Dibuat aman dipakai di desktop, tablet, dan mobile.</p>
                </div>
            </article>
        </section>

        <section class="content-card" style="margin-top: 20px;">
            <div class="section-header">
                <div>
                    <h2 class="section-title">Daftar Informasi</h2>
                    <p class="section-text">Edit atau hapus data langsung dari tabel di bawah ini.</p>
                </div>
            </div>

            <div class="table-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 80px;">No</th>
                            <th>Informasi</th>
                            <th style="width: 240px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($all_information as $index => $info)
                            <tr>
                                <td data-label="No">{{ $index + 1 }}</td>
                                <td data-label="Informasi">{{ $info->list_informasi }}</td>
                                <td data-label="Aksi">
                                    <div class="table-actions">
                                        <a href="{{ route('info.form', $info->id) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('info.delete', $info->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="empty-state">
                                        Belum ada data informasi. Klik tombol tambah untuk membuat data pertama.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    @endauth

    @guest
        <section class="content-card">
            <div class="section-header">
                <div>
                    <h2 class="section-title">Informasi Publik</h2>
                    <p class="section-text">Guest hanya melihat data yang sudah dipublikasikan oleh admin.</p>
                </div>
            </div>

            <div class="stack">
                @forelse ($all_information as $info)
                    <article class="panel">
                        <p class="section-text">{{ $info->list_informasi }}</p>
                    </article>
                @empty
                    <div class="empty-state">Belum ada informasi yang bisa ditampilkan.</div>
                @endforelse
            </div>
        </section>
    @endguest
@endsection