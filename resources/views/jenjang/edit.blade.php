@extends('layouts.app')

@section('content')
<h1 class="mb-4">Edit Jenjang</h1>

<form action="{{ route('jenjang.update', $jenjang->id_jenjang) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="jenjang" class="form-label">Jenjang:</label>
        <input type="text" name="jenjang" value="{{ $jenjang->jenjang }}" class="form-control" required>
        @error('jenjang')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
