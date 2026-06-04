@extends('layouts.app')

@section('title', $data ? 'Edit Informasi' : 'Tambah Informasi')

@section('content')
    <section class="hero-card">
        <div>
            <span class="eyebrow">Admin Form</span>
            <h1 class="page-title">{{ $data ? 'Edit Informasi' : 'Tambah Informasi' }}</h1>
            <p class="page-subtitle">
                Isi form dengan singkat, jelas, dan konsisten agar data lebih mudah dibaca saat testing.
            </p>
        </div>

        <div class="hero-actions">
            <a href="{{ route('home') }}" class="btn btn-ghost">Kembali</a>
        </div>
    </section>

    @include('partials.flash')

    <section class="auth-card">
        <form method="POST" action="{{ $data ? route('info.update', $data->id) : route('info.create') }}" class="stack">
            @csrf

            @if($data)
                @method('PUT')
            @endif

            <div class="field-group">
                <label for="list_informasi" class="field-label">Informasi</label>
                <input
                    type="text"
                    class="field-input"
                    id="list_informasi"
                    name="list_informasi"
                    value="{{ old('list_informasi', $data->list_informasi ?? '') }}"
                    placeholder="Contoh: Sistem akan maintenance pukul 22.00"
                    minlength="3"
                    maxlength="255"
                    required
                    autofocus
                >
                @error('list_informasi')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="button-row">
                <button type="submit" class="btn btn-primary">
                    {{ $data ? 'Update Informasi' : 'Simpan Informasi' }}
                </button>
                <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
            </div>

            <p class="footer-note">
                Data akan tampil di halaman home setelah disimpan.
            </p>
        </form>
    </section>
@endsection