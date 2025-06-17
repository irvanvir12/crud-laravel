<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        $jenjang = Jenjang::all();
        return view('jenjang.index', compact('jenjang'));
    }

    public function create()
    {
        return view('jenjang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenjang' => 'required|string|max:255',
        ]);

        Jenjang::create($request->all());
        return redirect()->route('jenjang.index')->with('success', 'Data jenjang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenjang = Jenjang::findOrFail($id);
        return view('jenjang.edit', compact('jenjang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenjang' => 'required|string|max:255',
        ]);

        $jenjang = Jenjang::findOrFail($id);
        $jenjang->update($request->all());

        return redirect()->route('jenjang.index')->with('success', 'Data jenjang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cek apakah ada mahasiswa yang masih memakai jenjang ini
        $digunakan = Mahasiswa::where('id_jenjang', $id)->exists();

        if ($digunakan) {
            return redirect()->route('jenjang.index')
                ->with('error', 'Data jenjang tidak bisa dihapus karena masih digunakan oleh mahasiswa.');
        }

        $jenjang = Jenjang::findOrFail($id);
        $jenjang->delete();

        return redirect()->route('jenjang.index')->with('success', 'Data jenjang berhasil dihapus.');
    }
}
