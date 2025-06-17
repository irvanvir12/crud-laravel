<?php

namespace App\Http\Controllers;

use App\Models\JenisKeterangan;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class JenisKeteranganController extends Controller
{
    public function index()
    {
        $data = JenisKeterangan::all();
        return view('jenisketerangan.index', compact('data'));
    }

    public function create()
    {
        return view('jenisketerangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_suket' => 'required|string|max:255|unique:t_jenisketerangan,f_suket',
        ]);

        JenisKeterangan::create([
            'f_suket' => $request->f_suket,
        ]);

        return redirect()->route('jenisketerangan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = JenisKeterangan::findOrFail($id);
        return view('jenisketerangan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'f_suket' => 'required|string|max:255|unique:t_jenisketerangan,f_suket,' . $id . ',f_id',
        ]);

        $item = JenisKeterangan::findOrFail($id);
        $item->update([
            'f_suket' => $request->f_suket,
        ]);

        return redirect()->route('jenisketerangan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $item = JenisKeterangan::findOrFail($id);
            $item->delete();

            return redirect()->route('jenisketerangan.index')->with('success', 'Data berhasil dihapus.');
        } catch (QueryException $e) {
            return redirect()->route('jenisketerangan.index')->with('error', 'Gagal menghapus. Data masih digunakan.');
        }
    }
}
