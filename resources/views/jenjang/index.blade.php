@extends('layouts.app')

@section('content')
    <h1>Data Jenjang</h1>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pesan error --}}
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('jenjang.create') }}" class="btn btn-primary mb-3">+ Tambah Jenjang</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Jenjang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenjang as $j)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $j->jenjang }}</td>
                    <td>
                        <a href="{{ route('jenjang.edit', $j->id_jenjang) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jenjang.destroy', $j->id_jenjang) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
