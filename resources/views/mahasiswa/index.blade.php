@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Data Mahasiswa</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jenjang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->f_nama }}</td>
                    <td>{{ $m->f_nim }}</td>
                    <td>{{ $m->jenjang->jenjang ?? '-' }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $m->f_id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('mahasiswa.destroy', $m->f_id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
