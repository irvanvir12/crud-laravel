@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan pada inputan.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="f_nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">NIM:</label>
            <input type="text" name="f_nim" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenjang:</label>
            <select name="id_jenjang" class="form-select" required>
                <option value="">-- Pilih Jenjang --</option>
                @foreach ($jenjang as $j)
                    <option value="{{ $j->id_jenjang }}">{{ $j->jenjang }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
