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
        .info-box div,
        .info-box input {
            background-color: #f7c6c6;
            padding: 10px;
            border-radius: 20px;
            margin-bottom: 10px;
            font-weight: bold;
            width: 100%;
            box-sizing: border-box;
        }
        .upgrade-button {
            background-color: #f7c6c6;
            padding: 10px 20px;
            border-radius: 20px;
            margin-top: 20px;
            display: inline-block;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #000;
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
            text-decoration: none;
        }
    </style>
</head>
<body>
    <a href="/home" class="arrow-left">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="content">
        <div class="profile-icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="info-box">
            <div>Nama: {{ $user->username }}</div>
            <div>Email: {{ $user->email }}</div>
            <div>Tingkatan Level: {{ $profil->level }}</div>
            <div>Score: {{ $profil->score }}</div>
        </div>
    </div>
    <div class="footer">
        <a href="/level" class="upgrade-button">
            Tingkatkan Level? Klik di sini
        </a>
    </div>
</body>
</html>
