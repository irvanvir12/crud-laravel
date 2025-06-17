@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Jenis Keterangan</h1>

    <form action="{{ route('jenisketerangan.update', $item->f_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="f_suket" class="form-label">Keterangan</label>
            <input type="text" name="f_suket" id="f_suket" class="form-control" value="{{ old('f_suket', $item->f_suket) }}" required>
            @error('f_suket')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('jenisketerangan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
