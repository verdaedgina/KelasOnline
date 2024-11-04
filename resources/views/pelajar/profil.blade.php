@extends('layouts.app')  <!-- Assuming you have a layout file named app.blade.php -->

@section('content')
<html>
<head>
    <title>Kelas Online</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }
        .header {
            background-color: #c98b8b;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }
        .logo {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            color: #000000;
        }
        .content {
            text-align: center;
            padding: 50px;
        }
        .profile-icon {
            font-size: 100px;
            margin-bottom: 20px;
        }
        .info-box {
            background-color: #d9a3a3;
            padding: 20px;
            border-radius: 20px;
            display: inline-block;
            text-align: left;
            width: 300px;
        }
        .info-box div {
            background-color: #f7c6c6;
            padding: 10px;
            border-radius: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .upgrade-button {
            background-color: #f7c6c6;
            padding: 10px 20px;
            border-radius: 20px;
            margin-top: 20px;
            display: inline-block;
            font-weight: bold;
            cursor: pointer;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
        }
        .arrow-left {
            position: absolute;
            top: 80px;
            left: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #c98b8b;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            KELAS ONLINE
        </div>
    </div>
    <div class="arrow-left">
        <i class="fas fa-arrow-left"></i>
    </div>
    <div class="content">
        <div class="profile-icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="info-box">
            <div>{{ $profil->username }}</div>
            <div>{{ $profil->email }}</div> <!-- Assuming you have a 'name' field in your 'profil' table -->
            <div>Tingkatan Level: {{ $profil->level }}</div>
            <div>Score: {{ $profil->score }}</div>
        </div>
    </div>
    <div class="footer">
        <div class="upgrade-button">
            Tingkatkan Level? Klik di sini
        </div>
    </div>
</body>
</html>
@endsection
