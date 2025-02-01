@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Mata Pelajaran</h2>

    <form action="{{ route('mapel.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select class="form-control" id="id_kelas" name="id_kelas">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="namaMapel">Nama Mapel</label>
            <input type="text" class="form-control" id="namaMapel" name="namaMapel" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
