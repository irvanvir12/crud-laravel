@extends('layouts.app')

@section('content')
<h1>Edit Status</h1>

<form action="{{ route('status.update', $status->f_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Status</label>
        <input type="text" name="f_status" value="{{ $status->f_status }}" class="form-control" required>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
