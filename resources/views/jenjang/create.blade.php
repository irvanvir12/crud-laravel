@extends('layouts.app')

@section('content')
<h1>Tambah Jenjang</h1>

<form action="{{ route('jenjang.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Jenjang:</label>
        <input type="text" name="jenjang" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
