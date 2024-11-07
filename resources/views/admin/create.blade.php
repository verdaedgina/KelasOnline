@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fff;
    }

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }

    .form-box {
        background-color: #fbd5d5;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    .form-box h2 {
        text-align: center;
        color: #a76360;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    form input, form select {
        padding: 15px;
        border: none;
        border-radius: 10px;
        background-color: #f6e1e1;
        font-size: 1rem;
    }

    form button {
        padding: 15px;
        background-color: #a76360;
        color: white;
        font-size: 1rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    form button:hover {
        background-color: #8f4e4a;
    }
</style>

<section class="form-container">
    <div class="form-box">
        <h2>Tambah Mapel</h2>
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- File input for image -->
            <input type="file" name="image" required>

            <!-- Dropdown for selecting Kelas -->
            <select name="kelas" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach($kelasList as $kelas)
                    <option value="{{ $kelas->nama_kelas }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>   

            <!-- Dropdown for selecting Mapel -->
            <select name="mapel" required>
                <option value="" disabled selected>Pilih Mapel</option>
                @foreach($mapels as $mapel)
                    <option value="{{ $mapel->namaMapel }}">{{ $mapel->namaMapel }}</option>
                @endforeach
            </select>

            <!-- Input fields for Materi, Artikel, and Video -->
            <input type="text" name="materi" placeholder="Masukkan materi" required>
            <input type="url" name="artikel" placeholder="Masukkan link artikel" required>
            <input type="url" name="video" placeholder="Masukkan link video" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</section>
@endsection
