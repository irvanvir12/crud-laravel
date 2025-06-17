<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jenjang; // Tambahkan ini
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('jenjang')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $jenjang = Jenjang::all();
        return view('mahasiswa.create', compact('jenjang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_nama' => 'required|string|max:255',
            'f_nim' => 'required|string|max:50',
            'id_jenjang' => 'required|integer',
        ]);

        Mahasiswa::create([
            'f_nama' => $request->f_nama,
            'f_nim' => $request->f_nim,
            'id_jenjang' => $request->id_jenjang,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jenjang = Jenjang::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jenjang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'f_nama' => 'required|string|max:255',
            'f_nim' => 'required|string|max:50',
            'id_jenjang' => 'required|integer',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'f_nama' => $request->f_nama,
            'f_nim' => $request->f_nim,
            'id_jenjang' => $request->id_jenjang,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus.');
    }
}