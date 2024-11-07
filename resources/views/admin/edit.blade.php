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
        <div class="form-header">
            <h2>Edit Mapel</h2>
        </div>
        <form action="{{ route('admin.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Tambahkan method PUT untuk update -->

            <input type="file" name="image" accept="image/*"> <!-- Tidak lagi required agar tidak perlu upload gambar lagi -->
            <input type="hidden" name="old_image" value="{{ $materi->image }}"> <!-- Simpan nama file gambar lama jika diperlukan -->

            <!-- Dropdown Kelas -->
            <select name="kelas" required>
                <option value="" disabled>Pilih Kelas</option>
                @foreach($kelasList as $kelas)
                    <option value="{{ $kelas->nama_kelas }}" {{ $kelas->nama_kelas == $materi->kelas ? 'selected' : '' }}>
                        {{ $kelas->nama_kelas }}
                    </option>
                @endforeach
            </select>   

            <!-- Dropdown Mapel -->
            <select name="mapel" required>
                <option value="" disabled>Pilih Mapel</option>
                @foreach($mapels as $mapel)
                    <option value="{{ $mapel->namaMapel }}" {{ $mapel->namaMapel == $materi->mapel ? 'selected' : '' }}>
                        {{ $mapel->namaMapel }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="materi" placeholder="Masukkan materi" value="{{ $materi->materi }}" required>
            <input type="url" name="artikel" placeholder="Masukkan link artikel" value="{{ $materi->artikel }}" required>
            <input type="url" name="video" placeholder="Masukkan link video" value="{{ $materi->video }}" required>
            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</section>
@endsection
