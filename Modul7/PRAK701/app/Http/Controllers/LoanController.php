<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['member', 'book'])->latest()->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::all();
        return view('loans.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ], [
            'member_id.required' => 'Member wajib dipilih.',
            'member_id.exists' => 'Member yang dipilih tidak valid.',
            'book_id.required' => 'Buku wajib dipilih.',
            'book_id.exists' => 'Buku yang dipilih tidak valid.',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tanggal_pinjam.date' => 'Tanggal pinjam harus berupa tanggal yang valid.',
            'tanggal_kembali.required' => 'Tanggal kembali wajib diisi.',
            'tanggal_kembali.date' => 'Tanggal kembali harus berupa tanggal yang valid.',
            'tanggal_kembali.after_or_equal' => 'Tanggal kembali tidak boleh lebih awal dari tanggal pinjam.',
        ]);

        Loan::create($request->all());

        return redirect()->route('loans.index')
            ->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit(Loan $loan)
    {
        $members = Member::all();
        $books = Book::all();
        return view('loans.edit', compact('loan', 'members', 'books'));
    }

    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ], [
            'member_id.required' => 'Member wajib dipilih.',
            'member_id.exists' => 'Member yang dipilih tidak valid.',
            'book_id.required' => 'Buku wajib dipilih.',
            'book_id.exists' => 'Buku yang dipilih tidak valid.',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tanggal_pinjam.date' => 'Tanggal pinjam harus berupa tanggal yang valid.',
            'tanggal_kembali.required' => 'Tanggal kembali wajib diisi.',
            'tanggal_kembali.date' => 'Tanggal kembali harus berupa tanggal yang valid.',
            'tanggal_kembali.after_or_equal' => 'Tanggal kembali tidak boleh lebih awal dari tanggal pinjam.',
        ]);

        $loan->update($request->all());

        return redirect()->route('loans.index')
            ->with('success', 'Peminjaman berhasil diperbarui!');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect()->route('loans.index')
            ->with('success', 'Peminjaman berhasil dihapus!');
    }
}