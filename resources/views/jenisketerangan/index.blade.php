@extends('layouts.app')

@section('content')
    <h1>Data Jenis Keterangan</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('jenisketerangan.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i => $d)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $d->f_suket }}</td>
                    <td>
                        <a href="{{ route('jenisketerangan.edit', $d->f_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('jenisketerangan.destroy', $d->f_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
