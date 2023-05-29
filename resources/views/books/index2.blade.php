@extends('layouts.app')

@section('content')
    <h1>Daftar Buku</h1>

    @if ($books->isEmpty())
        <p>Tidak ada buku yang tersedia.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->book_id) }}">Edit</a>
                            <form action="{{ route('books.destroy', $book->book_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('books.create') }}">Tambah Buku Baru</a>
@endsection
