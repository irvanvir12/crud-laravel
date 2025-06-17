@extends('layouts.app')

@section('content')
<h1>Tambah Status</h1>

<form action="{{ route('status.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Status</label>
        <input type="text" name="f_status" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
