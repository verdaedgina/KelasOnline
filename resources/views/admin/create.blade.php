@extends('layouts.app')
@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fff;
        }

        form-container {
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
    <section class="form-container">
        <div class="form-box">
            <div class="form-header">
                <h2>Tambah mapel</h2>
            </div>
            <form action="" method="post">
                <input type="text" placeholder="Tambah mapel" required>
                <input type="text" placeholder="Masukkan kelas" required>
                <input type="text" placeholder="Masukkan link artikel" required>
                <input type="text" placeholder="Masukkan link video" required>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </section>
@endsection