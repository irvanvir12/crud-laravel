@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Data History</h1>

    <form action="{{ route('history.update', $history->f_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="f_id_mhs" class="form-label">Mahasiswa</label>
            <select name="f_id_mhs" class="form-select">
                @foreach ($mahasiswa as $m)
                    <option value="{{ $m->f_id }}" {{ $history->f_id_mhs == $m->f_id ? 'selected' : '' }}>
                        {{ $m->f_nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="f_id_jenisket" class="form-label">Jenis Keterangan</label>
            <select name="f_id_jenisket" class="form-select">
                @foreach ($jenisketerangan as $j)
                    <option value="{{ $j->f_id }}" {{ $history->f_id_jenisket == $j->f_id ? 'selected' : '' }}>
                        {{ $j->f_suket }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="f_idstatus" class="form-label">Status</label>
            <select name="f_idstatus" class="form-select">
                @foreach ($status as $s)
                    <option value="{{ $s->f_id }}" {{ $history->f_idstatus == $s->f_id ? 'selected' : '' }}>
                        {{ $s->f_status }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('history.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
