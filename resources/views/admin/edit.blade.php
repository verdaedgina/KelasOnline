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

    form input {
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
<div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Tambah Data Tiket</h4>
                        <form action="{{ route('tiket.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!--gambar -->
                            <div class="form-group">
                                <label>GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--kelas kereta -->
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control @error('kelas') is-invalid @enderror" name="kelas">
                                    <option selected disabled>Pilih Salah Satu</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Bisnis">Bisnis</option>
                                    <option value="Eksekutif">Eksekutif</option>
                                </select>   
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- nama penumpang -->
                            <div class="form-group">
                                <label>Nama Penumpang</label>
                                <input type="text" class="form-control @error('namapenumpang') is-invalid @enderror" name="namapenumpang" value="{{ old('namapenumpang') }}" placeholder="Masukkan nama anda">
                                @error('namapenumpang')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="Masukkan harga">
                                @error('harga')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                                <!-- tanggal berangkat -->
                            <div class="form-group">
                                <label>Tanggal Berangkat</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- stasiun -->
                            <div class="form-group">
                                <label>Stasiun Awal</label>
                                <input type="text" class="form-control @error('asalstasiun') is-invalid @enderror" name="asalstasiun" value="{{ old('asalstasiun') }}" placeholder="Masukkan stasiun awal">
                                @error('asalstasiun')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Stasiun Tujuan</label>
                                <input type="text" class="form-control @error('tujuanstasiun') is-invalid @enderror" name="tujuanstasiun" value="{{ old('tujuanstasiun') }}" placeholder="Masukkan stasiun akhir">
                                @error('tujuanstasiun')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- tombol -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                                <button type="reset" class="btn btn-warning btn-md">RESET</button>
                                <a href="/tiket" class="btn btn-dark btn-md">KEMBALI</a>
                            </div>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>


    
@endsection
