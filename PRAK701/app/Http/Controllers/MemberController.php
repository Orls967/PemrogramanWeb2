<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_member' => 'required|string|max:255',
            'nomor_member' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tgl_mendaftar' => 'required|date',
            'tgl_terakhir_bayar' => 'required|date|after_or_equal:tgl_mendaftar',
        ], [
            'nama_member.required' => 'Nama member wajib diisi.',
            'nama_member.string' => 'Nama member harus berupa teks.',
            'nama_member.max' => 'Nama member maksimal 255 karakter.',
            'nomor_member.required' => 'Nomor member wajib diisi.',
            'nomor_member.string' => 'Nomor member harus berupa teks.',
            'nomor_member.max' => 'Nomor member maksimal 255 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'tgl_mendaftar.required' => 'Tanggal mendaftar wajib diisi.',
            'tgl_mendaftar.date' => 'Tanggal mendaftar harus berupa tanggal yang valid.',
            'tgl_terakhir_bayar.required' => 'Tanggal terakhir bayar wajib diisi.',
            'tgl_terakhir_bayar.date' => 'Tanggal terakhir bayar harus berupa tanggal yang valid.',
            'tgl_terakhir_bayar.after_or_equal' => 'Tanggal terakhir bayar tidak boleh lebih awal dari tanggal mendaftar.',
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')
            ->with('success', 'Member berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nama_member' => 'required|string|max:255',
            'nomor_member' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tgl_mendaftar' => 'required|date',
            'tgl_terakhir_bayar' => 'required|date|after_or_equal:tgl_mendaftar',
        ], [
            'nama_member.required' => 'Nama member wajib diisi.',
            'nama_member.string' => 'Nama member harus berupa teks.',
            'nama_member.max' => 'Nama member maksimal 255 karakter.',
            'nomor_member.required' => 'Nomor member wajib diisi.',
            'nomor_member.string' => 'Nomor member harus berupa teks.',
            'nomor_member.max' => 'Nomor member maksimal 255 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'tgl_mendaftar.required' => 'Tanggal mendaftar wajib diisi.',
            'tgl_mendaftar.date' => 'Tanggal mendaftar harus berupa tanggal yang valid.',
            'tgl_terakhir_bayar.required' => 'Tanggal terakhir bayar wajib diisi.',
            'tgl_terakhir_bayar.date' => 'Tanggal terakhir bayar harus berupa tanggal yang valid.',
            'tgl_terakhir_bayar.after_or_equal' => 'Tanggal terakhir bayar tidak boleh lebih awal dari tanggal mendaftar.',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')
            ->with('success', 'Member berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Member berhasil dihapus!');
    }
}