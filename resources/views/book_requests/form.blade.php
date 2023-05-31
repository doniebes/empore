@extends('layouts.app')

@section('content')
    <h1>{{ isset($book) ? 'Edit Buku' : 'Tambah Buku Baru' }}</h1>

    <form action="{{ isset($book) ? route('books.update', $book->book_id) : route('books.store') }}" method="POST">
        @csrf

        @if (isset($book))
            @method('PUT')
        @endif

        <label for="title">Judul:</label>
        <input type="text" name="title" value="{{ isset($book) ? $book->title : old('title') }}">

        <label for="author">Pengarang:</label>
        <input type="text" name="author" value="{{ isset($book) ? $book->author : old('author') }}">

        <label for="publication_year">Tahun Terbit:</label>
        <input type="text" name="publication_year" value="{{ isset($book) ? $book->publication_year : old('publication_year') }}">

        <button type="submit">{{ isset($book) ? 'Update' : 'Simpan' }}</button>
    </form>
@endsection
