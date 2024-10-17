@extends('layouts.app')
@section('content')
<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }
        .back-arrow {
            position: absolute;
            top: 30px;
            left: 20px;
            font-size: 24px;
            color: #D19A9A;
            cursor: pointer;
        }
        .content {
            text-align: center;
            padding: 50px;
        }
        .profile-icon {
            font-size: 100px;
            color: #000000;
            margin-top: 20px;
        }
        .info-box {
            background-color: #D19A9A;
            border-radius: 20px;
            padding: 20px;
            display: inline-block;
            text-align: left;
            margin-top: 20px;
            width: 400px;
        }
        .info-item {
            background-color: #FBCBCB;
            border-radius: 20px;
            padding: 10px 20px;
            margin: 10px 0;
            font-size: 18px;
            font-weight: bold;
            color: #7A4E4E;
        }
        .info-item.split {
            display: flex;
            justify-content: space-between;
        }
        .info-item.split .score {
            background-color: #FBCBCB;
            border-radius: 20px;
            padding: 10px 20px;
            color: #7A4E4E;
            margin-left: 10px;
            flex: 1;
            text-align: center;
        }
        .upgrade-button {
            background-color: #FBCBCB;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            color: #7A4E4E;
            margin-top: 20px;
            cursor: pointer;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <i class="fas fa-arrow-left back-arrow"></i>
    <div class="content">
        <div class="profile-icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="info-box">
            <div class="info-item">Username</div>
            <div class="info-item">Nama akun</div>
            <div class="info-item">Tingkatan Level</div>
            <div class="info-item score">score</div>
        </div>
        <button class="upgrade-button">Tingkatkan Level? Klik di sini</button>
    </div>

@extends('layouts.app')