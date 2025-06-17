@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>Selamat Datang</h1>
        <p class="lead">Silakan pilih menu di bawah ini untuk mengelola data.</p>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary mt-3 me-2">Data Mahasiswa</a>
        <a href="{{ route('jenisketerangan.index') }}" class="btn btn-primary mt-3 mx-2">Jenis Keterangan</a>
        <a href="{{ route('status.index') }}" class="btn btn-primary mt-3 mx-2">Status</a>
        <a href="{{ route('jenjang.index') }}" class="btn btn-primary mt-3 mx-2">Jenjang</a>
        <a href="{{ route('history.index') }}" class="btn btn-primary mt-3 mx-2">Data History</a>
    </div>
@endsection
