<div class="flash-stack">
    @if (session('success'))
        <div class="flash flash-success" data-flash>
            <div>
                <p class="flash-title">Berhasil</p>
                <p class="flash-text">{{ session('success') }}</p>
            </div>
            <button type="button" class="flash-close" aria-label="Tutup notifikasi" data-flash-close>&times;</button>
        </div>
    @endif

    @if (session('error'))
        <div class="flash flash-error" data-flash>
            <div>
                <p class="flash-title">Ada masalah</p>
                <p class="flash-text">{{ session('error') }}</p>
            </div>
            <button type="button" class="flash-close" aria-label="Tutup notifikasi" data-flash-close>&times;</button>
        </div>
    @endif

    @if ($errors->has('login'))
        <div class="flash flash-error" data-flash>
            <div>
                <p class="flash-title">Login gagal</p>
                <p class="flash-text">{{ $errors->first('login') }}</p>
            </div>
            <button type="button" class="flash-close" aria-label="Tutup notifikasi" data-flash-close>&times;</button>
        </div>
    @elseif ($errors->any())
        <div class="flash flash-error" data-flash>
            <div>
                <p class="flash-title">Validasi gagal</p>
                <p class="flash-text">{{ $errors->first() }}</p>
            </div>
            <button type="button" class="flash-close" aria-label="Tutup notifikasi" data-flash-close>&times;</button>
        </div>
    @endif
</div>