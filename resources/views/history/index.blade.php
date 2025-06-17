@extends('layouts.app')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <h1>Data History</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('history.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Jenis Keterangan</th>
                <th>Status</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $i => $h)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $h->mahasiswa->f_nama ?? '-' }}</td>
                    <td>{{ $h->jenisketerangan->f_suket ?? '-' }}</td>
                    <td>{{ $h->status->f_status ?? '-' }}</td>
                    <td>{{ Carbon::parse($h->f_created)->format('d-m-Y') }} ({{ Carbon::parse($h->f_created)->format('H:i:s') }})</td>
                    <td>
                        <a href="{{ route('history.edit', $h->f_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('history.destroy', $h->f_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
