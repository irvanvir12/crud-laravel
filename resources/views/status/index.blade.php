@extends('layouts.app')

@section('content')
<h1>Status</h1>

{{-- Pesan sukses --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Pesan error --}}
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<a href="{{ route('status.create') }}" class="btn btn-primary mb-2">+ Tambah Status</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->f_status }}</td>
            <td>
                <a href="{{ route('status.edit', $item->f_id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('status.destroy', $item->f_id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
