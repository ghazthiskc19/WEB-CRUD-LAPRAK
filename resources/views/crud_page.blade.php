<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page Information</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h2>{{ $data ? 'Edit Information' : 'Add Information'}}</h2>
        <form method="POST" action="{{ $data ? route('info.update', $data->id ) : route('info.create')}}">
            @csrf

            @if($data)
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <input type="text" 
                        class="form-control" 
                        id="list_informasi" 
                        name="list_informasi"
                        value="{{ old('list_informasi', $data->list_informasi ?? '') }}" 
                        required>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ $data ? 'Update Informasi' : 'Buat Informasi'}}
            </button>
        </form>
    </div>
</body>
</html>