@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Mahasiswa</h1>

    <form action="{{ route('mahasiswa.update', $mahasiswa->f_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="f_nama" class="form-label">Nama</label>
            <input type="text" name="f_nama" id="f_nama" class="form-control" value="{{ old('f_nama', $mahasiswa->f_nama) }}" required>
            @error('f_nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="f_nim" class="form-label">NIM</label>
            <input type="text" name="f_nim" id="f_nim" class="form-control" value="{{ old('f_nim', $mahasiswa->f_nim) }}" required>
            @error('f_nim')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_jenjang" class="form-label">Jenjang</label>
            <select name="id_jenjang" id="id_jenjang" class="form-select" required>
                <option value="">-- Pilih Jenjang --</option>
                @foreach ($jenjang as $j)
                    <option value="{{ $j->id_jenjang }}" {{ $mahasiswa->id_jenjang == $j->id_jenjang ? 'selected' : '' }}>
                        {{ $j->jenjang }}
                    </option>
                @endforeach
            </select>
            @error('id_jenjang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
