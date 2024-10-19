@extends('layouts.app')

@section('content')
<style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fff;
    }
    .container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    }
      \.data-mapel {
    margin: 40px;
    }

    .table-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .table-header h2 {
        margin: 0;
    }

    .back-button {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fbd5d5;
    }

    .data-table th, .data-table td {
        padding: 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .data-table th {
        background-color: #f7b9b9;
        color: #5f2c2c;
    }

    .data-table td a {
        color: #a76360;
        text-decoration: none;
    }

    .data-table td a:hover {
        text-decoration: underline;
    }

    .add-button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #a76360;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    .add-button:hover {
        background-color: #8f4e4a;
    } 
</style>
<section class="data-mapel">
            <div class="table-header">
                <button class="back-button">&larr;</button>
                <h2>Data Mapel</h2>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mapel</th>
                        <th>Kode Mapel</th>
                        <th>Kelas</th>
                        <th>Link Video</th>
                        <th>Link Artikel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Matematika</td>
                        <td>MTK01</td>
                        <td>10</td>
                        <td><a href="#">Link Video</a></td>
                        <td><a href="#">Link Artikel</a></td>
                        <td><a href="#">Delete</a> | <a href="#">Edit</a></td>
                    </tr>
                    <!-- Tambahkan data lainnya di sini -->
                </tbody>
            </table>

            <button class="add-button">Tambah</button>
        </section>
    </div>
@endsection