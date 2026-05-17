<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @auth
            Home Admin
        @endauth
        
        @guest
            Home Guest
        @endguest
    </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @auth
        <div class="container mt-5">
            <h2>Welcome, {{ Auth::user()->username }}1 </h2>
            <p>You are logged in!</p>
        </div>

         <div class="container mt-5">
            <h3>Kamu seorang admin jirs</h3>
            <ul>
                @foreach($all_information as $info)
                    <li>
                        <p> {{ $info->list_informasi }} </p>
                        <a href="{{ route('info.form', $info->id) }}"> edit </a>
                        <form action="{{ route('info.delete', $info->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah anda yakin dihapus?')">Hapus</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="container mt-5">
            <h3>Admin Actions</h3>
            <a href="{{ route('info.form') }}" class="btn btn-primary">Create Information</a>
            <a href="{{ route('logout') }}">Log out</a>
        </div>
    @endauth

    @guest
            <div class="container mt-5">
                <h2>Welcome to the Home Page</h2>
                <p>Anda login sebagai guest.</p>
            </div>

            <div class="container mt-5">
                <h3>Informasi dari Admin</h3>
                <ul>
                    @foreach ($all_information as $info)
                        <li>
                            <p>
                                {{ $info->list_informasi }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="login-button">
                <a href="{{ route('login') }}">Login disini</a>
            </div>
    @endguest
</body>
</html>