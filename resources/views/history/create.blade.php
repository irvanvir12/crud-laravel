@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Tambah Data History</h1>

    <form action="{{ route('history.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="f_id_mhs" class="form-label">Mahasiswa</label>
            <select name="f_id_mhs" id="f_id_mhs" class="form-select" required>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach ($mahasiswa as $m)
                    <option value="{{ $m->f_id }}">{{ $m->f_nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="f_id_jenisket" class="form-label">Jenis Keterangan</label>
            <select name="f_id_jenisket" id="f_id_jenisket" class="form-select" required>
                <option value="">-- Pilih Keterangan --</option>
                @foreach ($jenisketerangan as $j)
                    <option value="{{ $j->f_id }}">{{ $j->f_suket }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="f_idstatus" class="form-label">Status</label>
            <select name="f_idstatus" id="f_idstatus" class="form-select" required>
                <option value="">-- Pilih Status --</option>
                @foreach ($status as $s)
                    <option value="{{ $s->f_id }}">{{ $s->f_status }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="f_created" class="form-label">Tanggal Dibuat</label>
            <input type="datetime-local" name="f_created" id="f_created" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('history.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
