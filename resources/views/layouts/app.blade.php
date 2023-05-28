<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Peminjaman Buku</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('books.index') }}">Daftar Buku</a></li>
                <li><a href="{{ route('books.create') }}">Tambah Buku</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Aplikasi Peminjaman Buku. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
