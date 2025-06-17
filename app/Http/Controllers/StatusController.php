<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class StatusController extends Controller
{
    public function index()
    {
        $data = Status::all();
        return view('status.index', compact('data'));
    }

    public function create()
    {
        return view('status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_status' => 'required|string|max:255|unique:k_status,f_status',
        ]);

        Status::create([
            'f_status' => $request->f_status,
        ]);

        return redirect()->route('status.index')->with('success', 'Data status berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('status.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'f_status' => 'required|string|max:255|unique:k_status,f_status,' . $id . ',f_id',
        ]);

        $status = Status::findOrFail($id);
        $status->update([
            'f_status' => $request->f_status,
        ]);

        return redirect()->route('status.index')->with('success', 'Data status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $status = Status::findOrFail($id);
            $status->delete();

            return redirect()->route('status.index')->with('success', 'Data status berhasil dihapus.');
        } catch (QueryException $e) {
            // Tangkap error karena foreign key constraint
            return redirect()->route('status.index')->with('error', 'Gagal menghapus. Data status sedang digunakan.');
        }
    }
}
