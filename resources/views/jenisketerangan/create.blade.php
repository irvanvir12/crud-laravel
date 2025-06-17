@extends('layouts.app')

@section('content')
    <h1>Tambah Jenis Keterangan</h1>

    <form action="{{ route('jenisketerangan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="f_suket" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
@endsection
