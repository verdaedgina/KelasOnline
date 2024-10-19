@extends('layouts.app')

@section('content')
<style>
   body {
            background-color: #D19C9C;
            font-family: 'Courier Prime', monospace;
        }
        .content {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
        }
        .content img {
            width: 300px;
            height: auto;
            margin-right: 50px;
        }
        .content p {
            color: #4A2C2A;
            font-size: 20px;
            max-width: 500px;
        }
        .footer {
            background-color: white;
            text-align: right;
            padding: 20px;
        }
        .footer a {
            color: #D19C9C;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            margin-right: 10px;
        }
        .footer i {
            font-size: 30px;
            margin-right: 10px;
        }
  </style>
 </head>
 <body>
  <div class="content">
   <img src="img/foto pkk 1.png" alt="Students Image" height="300"  width="300"/>
   <p>
    Selamat datang di platform belajar online kami, dirancang khusus untuk siswa SMK dengan Kurikulum Merdeka. Temukan materi lengkap dan video pembelajaran yang mendukung perjalanan akademis Anda menuju masa depan yang lebih baik.
   </p>
  </div>
  <div class="footer">
   <a href="{{ route('profil') }}">{{ Auth::user()->username }}</a>
   <img src="img/akun 1.png" alt="Profile Icon"  height="35"  width="35">
  </div>
@endsection
