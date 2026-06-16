<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric|gt:1800|lt:2026',
        ], [
            'judul.required' => 'Judul wajib diisi dan berupa string.',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'penulis.required' => 'Penulis wajib diisi dan berupa string.',
            'penulis.string' => 'Penulis harus berupa teks.',
            'penulis.max' => 'Penulis maksimal 255 karakter.',
            'penerbit.required' => 'Penerbit wajib diisi dan berupa string.',
            'penerbit.string' => 'Penerbit harus berupa teks.',
            'penerbit.max' => 'Penerbit maksimal 255 karakter.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi dan berupa angka.',
            'tahun_terbit.numeric' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.gt' => 'Tahun terbit harus lebih besar dari 1800.',
            'tahun_terbit.lt' => 'Tahun terbit harus lebih kecil dari 2026.',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric|gt:1800|lt:2026',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'penulis.required' => 'Penulis wajib diisi.',
            'penulis.string' => 'Penulis harus berupa teks.',
            'penulis.max' => 'Penulis maksimal 255 karakter.',
            'penerbit.required' => 'Penerbit wajib diisi.',
            'penerbit.string' => 'Penerbit harus berupa teks.',
            'penerbit.max' => 'Penerbit maksimal 255 karakter.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.numeric' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.gt' => 'Tahun terbit harus lebih besar dari 1800.',
            'tahun_terbit.lt' => 'Tahun terbit harus lebih kecil dari 2026.',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}