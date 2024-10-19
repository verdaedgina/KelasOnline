@extends('layouts.app')
@section('content')
<style>
   body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #C48A8A;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            height: 50px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #000;
        }
        .header nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #000;
            font-size: 18px;
        }
        .container {
            padding: 20px;
        }
        .table-container {
            background-color: #FBCBCB;
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #000;
        }
        th {
            background-color: #D99A9A;
            color: #000;
        }
        td {
            background-color: #D99A9A;
        }
        .add-button {
            background-color: #8B5A5A;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }
        .back-arrow {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .back-arrow i {
            font-size: 24px;
            color: #C48A8A;
        }
  </style>
 </head>
 <body>
  <div class="header">
   <div>
    <img alt="Kelas Online Logo" height="50" src="https://storage.googleapis.com/a1aa/image/HHeTSauBfeMdbJH4pxxQEScqV9yrAfA8u5lYmyCz9LI4eNwcC.jpg" width="50"/>
   </div>
   <nav>
    <a href="#">
     Data mapel
    </a>
    <a href="#">
     Data siswa
    </a>
   </nav>
  </div>
  <div class="container">
   <div class="back-arrow">
    <i class="fas fa-arrow-left">
    </i>
   </div>
   <div class="table-container">
    <table>
     <thead>
      <tr>
       <th>No</th>
       <th>Nama mapel</th>
       <th>Kode mapel</th>
       <th>Kelas</th>
       <th>Link video</th>
       <th>Link artikel</th>
       <th>Actions</th>
      </tr>
     </thead>
     <tbody>
      <tr>
       <td></td>
       <td>{{ $mapel-> namaMapel}}</td>
       <td>{{ $mapel-> id}}</td>
       <td>{{ $mapel-> idkelas}}</td>
       <td>{{ $mapel-> idlink}}</td>
       <td></td>
       <td class="text-center">
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
            </form>
        </td>
      </tr>
     </tbody>
    </table>
   </div>
   <div style="text-align: right; margin-top: 20px;">
    <button class="add-button">
     Tambah
    </button>
   </div>
  </div>
@endsection