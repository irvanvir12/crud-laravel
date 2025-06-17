<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Mahasiswa;
use App\Models\JenisKeterangan;
use App\Models\Status;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::with(['mahasiswa', 'jenisketerangan', 'status'])->get();
        return view('history.index', compact('histories'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $jenisketerangan = JenisKeterangan::all();
        $status = Status::all();
        return view('history.create', compact('mahasiswa', 'jenisketerangan', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_id_mhs' => 'required|integer',
            'f_id_jenisket' => 'required|integer',
            'f_created' => 'required|date',
            'f_idstatus' => 'required|integer',
        ]);

        History::create($request->all());
        return redirect()->route('history.index')->with('success', 'Data riwayat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $history = History::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $jenisketerangan = JenisKeterangan::all();
        $status = Status::all();
        return view('history.edit', compact('history', 'mahasiswa', 'jenisketerangan', 'status'));
    }

    public function update(Request $request, $id)
    {
        $history = History::findOrFail($id);
        $history->update($request->all());
        return redirect()->route('history.index')->with('success', 'Data riwayat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        History::destroy($id);
        return redirect()->route('history.index')->with('success', 'Data riwayat berhasil dihapus.');
    }
}
