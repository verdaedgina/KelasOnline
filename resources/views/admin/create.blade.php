@extends('layouts.app')

@section('content')
<style>
    /* Styling seperti yang Anda berikan sebelumnya */
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
        margin-top: 80px;
    }

    .form-box {
        background-color: #fbd5d5;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
        box-sizing: border-box;
    }

    .form-header h2 {
        text-align: center;
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    form input, form select {
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f6e1e1;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    form input:focus, form select:focus {
        background-color: #f1d7d7;
        outline: none;
    }

    form button {
        padding: 15px;
        background-color: #a76360;
        color: white;
        font-size: 1rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #8f4e4a;
    }
</style>

<section class="form-container">
    <div class="form-box">
        <div class="form-header">
            <h2>Tambah Materi</h2>
        </div>

        <!-- Form untuk memilih Kelas (GET) -->
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf  <!-- Token CSRF untuk keamanan -->

        <input type="file" name="image" required>

        <select name="kelas" required>
                    <option value="" disabled>Pilih Kelas</option>
                    @foreach($kelasList as $kelas)
                        <option value="{{ $kelas->nama_kelas }}">
                            {{ $kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>

                <!-- Dropdown Mapel yang terhubung dengan Kelas -->
                <select name="mapel" required>
                    <option value="" disabled>Pilih Mapel</option>
                    @foreach($mapels as $mapel)
                        <option value="{{ $mapel->namaMapel }}">
                            {{ $mapel->namaMapel }}
                        </option>
                    @endforeach
                </select>
                </select>
            </div>
            
            <input type="text" name="materi" placeholder="Masukkan materi" required>
            <input type="url" name="artikel" placeholder="Masukkan link artikel" required>
            <input type="url" name="video" placeholder="Masukkan link video" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</section>
@endsection
