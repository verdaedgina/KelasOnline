@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Mata Pelajaran</h2>

    <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select class="form-control" id="id_kelas" name="id_kelas">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ $mapel->id_kelas == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="namaMapel">Nama Mapel</label>
            <input type="text" class="form-control" id="namaMapel" name="namaMapel" value="{{ $mapel->namaMapel }}" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $mapel->slug }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
